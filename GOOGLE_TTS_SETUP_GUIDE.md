# Google Cloud Text-to-Speech Setup Guide

## Overview
This guide will help you set up Google Cloud Text-to-Speech as an **optional premium** feature alongside the free Web Speech API.

---

## ✅ What's Been Implemented

### 1. **Backend Components**
- ✅ Google Cloud TTS SDK installed (`google/cloud-text-to-speech`)
- ✅ `GoogleTextToSpeechService` class created
- ✅ `TextToSpeechController` for API endpoints
- ✅ Configuration added to `config/services.php`
- ✅ API routes created (`/api/tts/*`)

### 2. **Features**
- ✅ Automatic caching system (24-hour default)
- ✅ Audio file storage in `storage/app/public/tts/`
- ✅ Cost estimation tool
- ✅ Voice listing API
- ✅ Fallback to Web Speech API
- ✅ Tamil and English support

---

## 🚀 Setup Instructions

### Step 1: Create Google Cloud Project

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select existing one
3. Enable **Cloud Text-to-Speech API**:
   - Go to "APIs & Services" > "Library"
   - Search for "Cloud Text-to-Speech API"
   - Click "Enable"

### Step 2: Create Service Account

1. Go to "IAM & Admin" > "Service Accounts"
2. Click "Create Service Account"
3. Name: `vck-tts-service`
4. Role: `Cloud Text-to-Speech User`
5. Click "Create Key" > JSON format
6. Download the JSON file

### Step 3: Configure Application

1. **Copy credentials file**:
   ```bash
   mkdir -p storage/app/google
   cp ~/Downloads/your-credentials.json storage/app/google/tts-credentials.json
   chmod 600 storage/app/google/tts-credentials.json
   ```

2. **Update `.env` file**:
   ```env
   # Google Cloud Text-to-Speech Configuration
   GOOGLE_TTS_ENABLED=false
   GOOGLE_TTS_CREDENTIALS_PATH=/path/to/your/storage/app/google/tts-credentials.json
   GOOGLE_TTS_CACHE_ENABLED=true
   GOOGLE_TTS_CACHE_DURATION=86400
   ```

3. **Create storage directory**:
   ```bash
   php artisan storage:link
   mkdir -p storage/app/public/tts
   chmod 755 storage/app/public/tts
   ```

### Step 4: Enable Billing

Google Cloud TTS requires a billing account:
1. Go to "Billing" in Google Cloud Console
2. Link a payment method
3. Free tier: **1 million characters/month** for WaveNet voices

---

## 💰 Pricing Information

### Free Tier (Monthly)
- **4 million characters** for Standard voices
- **1 million characters** for WaveNet voices

### Paid Tier (per 1 million characters)
- **Standard voices**: $4.00
- **WaveNet voices**: $16.00  (Recommended for Tamil)

### VCK Usage Estimate
- Average article: ~2,000 characters
- **500 articles/month** = 1,000,000 characters
- **Cost with WaveNet**: ~$16/month
- **Cost with Standard**: ~$4/month

---

## 🎯 How It Works

### Current Setup (Web Speech API Only)
```
User clicks TTS button → Browser speaks text (Free)
```

### With Google Cloud TTS (Optional)
```
User clicks TTS button →
  ↓
Check if Google TTS enabled?
  ├─ YES → Call API → Generate/Cache Audio → Play MP3
  └─ NO  → Use Web Speech API (Free fallback)
```

---

## 🔧 API Endpoints

### 1. Check TTS Status
```javascript
GET /api/tts/status

Response:
{
  "google_tts_enabled": false,
  "web_speech_available": true,
  "default_engine": "web_speech"
}
```

### 2. Synthesize Speech
```javascript
POST /api/tts/synthesize
{
  "text": "வணக்கம், இது சோதனை",
  "language": "ta",
  "use_google": true
}

Response:
{
  "success": true,
  "audio_url": "/storage/tts/abc123.mp3",
  "cached": false,
  "engine": "google_cloud_tts"
}
```

### 3. Get Available Voices
```javascript
GET /api/tts/voices?language=ta

Response:
{
  "success": true,
  "voices": [
    {
      "name": "ta-IN-Wavenet-A",
      "gender": "Female",
      "language_codes": ["ta-IN"]
    },
    ...
  ]
}
```

### 4. Estimate Cost
```javascript
POST /api/tts/estimate-cost
{
  "text": "Your article text here..."
}

Response:
{
  "success": true,
  "estimate": {
    "characters": 2500,
    "wavenet_cost": "0.0400",
    "standard_cost": "0.0100"
  }
}
```

---

## 📝 Testing the Setup

### 1. Test Status Endpoint
```bash
curl http://localhost:8000/api/tts/status
```

### 2. Test with Sample Text
```bash
curl -X POST http://localhost:8000/api/tts/synthesize \
  -H "Content-Type: application/json" \
  -d '{
    "text": "வணக்கம், இது சோதனை",
    "language": "ta",
    "use_google": true
  }'
```

### 3. Check Generated Audio
```bash
ls -lh storage/app/public/tts/
```

---

## 🎨 Frontend Integration (Next Steps)

To enable Google TTS in the frontend, you would need to:

1. **Update `text-to-speech.js`** to check TTS status on init
2. **Add settings toggle** in player UI for users to choose engine
3. **Handle audio playback** for MP3 files from Google TTS
4. **Show premium badge** when using Google TTS

Example frontend code would look like:
```javascript
// Check if Google TTS is available
async checkTTSStatus() {
    const response = await fetch('/api/tts/status');
    const data = await response.json();

    if (data.google_tts_enabled) {
        this.showPremiumOption = true;
    }
}

// Use Google TTS if enabled
async playWithGoogle(text, language) {
    const response = await fetch('/api/tts/synthesize', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            text: text,
            language: language,
            use_google: true
        })
    });

    const data = await response.json();

    if (data.success) {
        // Play the MP3 audio file
        const audio = new Audio(data.audio_url);
        audio.play();
    }
}
```

---

## 🔐 Security Considerations

1. **Credentials File**:
   - Never commit to Git
   - Add to `.gitignore`:
     ```
     storage/app/google/*.json
     ```

2. **Rate Limiting**:
   - Add rate limiting to API endpoints
   - Prevent abuse of Google Cloud credits

3. **CSRF Protection**:
   - API routes should have CSRF protection
   - Or use API tokens for authentication

---

## 🧹 Maintenance

### Clear Old Cached Audio
```bash
php artisan tinker
>>> app(App\Services\GoogleTextToSpeechService::class)->clearOldCache(7);
```

### Schedule Automatic Cleanup
Add to `app/Console/Kernel.php`:
```php
protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        app(\App\Services\GoogleTextToSpeechService::class)->clearOldCache(7);
    })->weekly();
}
```

---

## 🐛 Troubleshooting

### Error: "Credentials not found"
- Check `GOOGLE_TTS_CREDENTIALS_PATH` in `.env`
- Verify file exists and is readable
- Check file permissions: `chmod 600`

### Error: "API not enabled"
- Go to Google Cloud Console
- Enable "Cloud Text-to-Speech API"
- Wait 5-10 minutes for propagation

### Error: "Quota exceeded"
- Check Google Cloud Console > Quotas
- Either wait for monthly reset
- Or upgrade to paid tier

### Audio files not accessible
```bash
php artisan storage:link
chmod 755 storage/app/public/tts
```

---

## 📊 Monitoring Usage

### Via Google Cloud Console
1. Go to "APIs & Services" > "Dashboard"
2. Click "Cloud Text-to-Speech API"
3. View usage graphs and quotas

### Via Application Logs
```bash
tail -f storage/logs/laravel.log | grep "Google TTS"
```

---

## ✨ Benefits of Google Cloud TTS

### vs Web Speech API:

| Feature | Web Speech API | Google Cloud TTS |
|---------|----------------|------------------|
| **Cost** | Free | Paid (after free tier) |
| **Quality** | Good | Excellent |
| **Tamil Support** | Limited | Excellent (4 voices) |
| **Offline** | Yes | No |
| **Consistency** | Varies by browser | Always consistent |
| **Caching** | Not possible | Yes |
| **Download Audio** | No | Yes (MP3 files) |

---

## 🎯 Recommended Setup for VCK

1. **Start with Web Speech API** (Free, already working)
2. **Enable Google TTS** for premium experience (optional)
3. **Let users choose** which engine to use
4. **Cache aggressively** to reduce costs
5. **Monitor usage** monthly

---

##📄 Example .env Configuration

```env
# Existing configuration...

# Google Cloud Text-to-Speech (Optional Premium Feature)
GOOGLE_TTS_ENABLED=false
GOOGLE_TTS_CREDENTIALS_PATH="${PWD}/storage/app/google/tts-credentials.json"
GOOGLE_TTS_CACHE_ENABLED=true
GOOGLE_TTS_CACHE_DURATION=86400
```

---

## 🎉 Summary

✅ **Google Cloud TTS is now integrated but disabled by default**
✅ **Web Speech API continues to work as free fallback**
✅ **To enable**: Follow steps 1-4 above
✅ **Estimated cost**: ~$16/month for 500 articles with WaveNet
✅ **Quality improvement**: Significant for Tamil voices

**Status**: Implementation complete, waiting for Google Cloud credentials to enable.

---

**Last Updated**: December 18, 2025
**Status**: Ready for Google Cloud setup
