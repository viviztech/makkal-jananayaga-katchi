// Service Worker for VCK PWA
const CACHE_NAME = 'vck-cache-v1';
const STATIC_CACHE_NAME = 'vck-static-v1';
const DYNAMIC_CACHE_NAME = 'vck-dynamic-v1';

// Resources to cache immediately
const STATIC_ASSETS = [
  '/',
  '/offline',
  '/site.webmanifest',
  '/assets/images/favicons/android-chrome-192x192.png',
  '/assets/images/favicons/android-chrome-512x512.png',
  '/assets/images/favicons/apple-touch-icon.png',
  '/assets/css/app.css',
  '/assets/js/app.js'
];

// Install Service Worker
self.addEventListener('install', (event) => {
  console.log('[ServiceWorker] Install');
  event.waitUntil(
    (async () => {
      const cache = await caches.open(STATIC_CACHE_NAME);
      console.log('[ServiceWorker] Caching static assets');
      await cache.addAll(STATIC_ASSETS);
    })()
  );
  self.skipWaiting();
});

// Activate Service Worker
self.addEventListener('activate', (event) => {
  console.log('[ServiceWorker] Activate');
  event.waitUntil(
    (async () => {
      // Clean up old caches
      const cacheNames = await caches.keys();
      await Promise.all(
        cacheNames.map((cacheName) => {
          if (cacheName !== STATIC_CACHE_NAME && cacheName !== DYNAMIC_CACHE_NAME) {
            console.log('[ServiceWorker] Deleting old cache:', cacheName);
            return caches.delete(cacheName);
          }
        })
      );
    })()
  );
  self.clients.claim();
});

// Fetch Event - Handle requests
self.addEventListener('fetch', (event) => {
  const { request } = event;
  const url = new URL(request.url);

  // Skip non-GET requests
  if (request.method !== 'GET') return;

  // Skip external requests
  if (!url.origin.includes(self.location.origin)) return;

  // Handle navigation requests
  if (request.mode === 'navigate') {
    event.respondWith(
      (async () => {
        try {
          // Try network first for navigation
          const networkResponse = await fetch(request);
          return networkResponse;
        } catch (error) {
          // Fallback to cache or offline page
          const cache = await caches.open(STATIC_CACHE_NAME);
          let cachedResponse = await cache.match('/');

          if (!cachedResponse) {
            // Try to get offline page
            try {
              cachedResponse = await cache.match('/offline');
            } catch (e) {
              // If no offline page, return basic offline message
              return new Response(`
                <!DOCTYPE html>
                <html>
                <head><title>Offline - VCK</title></head>
                <body style="font-family: Arial, sans-serif; text-align: center; padding: 50px;">
                  <h1>You're Offline</h1>
                  <p>Please check your internet connection and try again.</p>
                  <button onclick="window.location.reload()">Try Again</button>
                </body>
                </html>
              `, {
                headers: { 'Content-Type': 'text/html' }
              });
            }
          }

          return cachedResponse;
        }
      })()
    );
    return;
  }

  // Handle static assets
  if (STATIC_ASSETS.includes(url.pathname) || url.pathname.match(/\.(css|js|png|jpg|jpeg|gif|svg|woff|woff2|ttf|eot)$/)) {
    event.respondWith(
      (async () => {
        const cache = await caches.open(STATIC_CACHE_NAME);
        const cachedResponse = await cache.match(request);

        if (cachedResponse) {
          return cachedResponse;
        }

        try {
          const networkResponse = await fetch(request);
          if (networkResponse.ok) {
            cache.put(request, networkResponse.clone());
          }
          return networkResponse;
        } catch (error) {
          console.log('[ServiceWorker] Fetch failed for static asset:', request.url);
          return new Response('Asset not available', { status: 503 });
        }
      })()
    );
    return;
  }

  // Handle other requests with Cache First strategy
  event.respondWith(
    (async () => {
      const cache = await caches.open(DYNAMIC_CACHE_NAME);
      const cachedResponse = await cache.match(request);

      if (cachedResponse) {
        // Return cached version and update in background
        fetch(request).then((networkResponse) => {
          if (networkResponse.ok) {
            cache.put(request, networkResponse.clone());
          }
        }).catch(() => {
          // Ignore network errors for background updates
        });

        return cachedResponse;
      }

      try {
        const networkResponse = await fetch(request);
        if (networkResponse.ok && !networkResponse.headers.get('Cache-Control')?.includes('no-cache')) {
          cache.put(request, networkResponse.clone());
        }
        return networkResponse;
      } catch (error) {
        console.log('[ServiceWorker] Fetch failed:', request.url);
        return new Response('Content not available', { status: 503 });
      }
    })()
  );
});

// Background sync for offline actions (if needed)
self.addEventListener('sync', (event) => {
  console.log('[ServiceWorker] Background sync triggered:', event.tag);

  if (event.tag === 'background-sync') {
    event.waitUntil(doBackgroundSync());
  }
});

// Push notifications (if needed)
self.addEventListener('push', (event) => {
  console.log('[ServiceWorker] Push received:', event);

  if (event.data) {
    const data = event.data.json();
    const options = {
      body: data.body,
      icon: '/assets/images/favicons/android-chrome-192x192.png',
      badge: '/assets/images/favicons/android-chrome-192x192.png',
      vibrate: [100, 50, 100],
      data: data.url,
      actions: [
        {
          action: 'view',
          title: 'View'
        },
        {
          action: 'close',
          title: 'Close'
        }
      ]
    };

    event.waitUntil(
      self.registration.showNotification(data.title, options)
    );
  }
});

// Handle notification clicks
self.addEventListener('notificationclick', (event) => {
  console.log('[ServiceWorker] Notification click:', event);

  event.notification.close();

  if (event.action === 'view') {
    const urlToOpen = event.notification.data || '/';
    event.waitUntil(
      clients.openWindow(urlToOpen)
    );
  }
});

// Background sync function (placeholder)
async function doBackgroundSync() {
  console.log('[ServiceWorker] Performing background sync');
  // Add background sync logic here if needed
  // For example, sync offline form submissions
}

// Cache cleanup utility
self.addEventListener('message', (event) => {
  if (event.data && event.data.type === 'CLEAN_CACHE') {
    event.waitUntil(
      (async () => {
        const cacheNames = await caches.keys();
        await Promise.all(
          cacheNames.map((cacheName) => {
            console.log('[ServiceWorker] Cleaning cache:', cacheName);
            return caches.delete(cacheName);
          })
        );
        event.ports[0].postMessage({ success: true });
      })()
    );
  }
});