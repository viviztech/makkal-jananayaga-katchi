# MJK Party - Project Roadmap & Task List

This roadmap outlines the phases of development for the Makkal Jananayaga Katchi (MJK) portal, synthesized from recent development history and current codebase state.

## 🛠 Phase 1: Governance & Foundation (Completed)
- **Framework Setup**: Laravel application with Filament 3 Admin Panel.
- **Geopolitical Structure**: Database models and migrations for State, District, Assembly, Corporation, Block, Perur, and Vattam.
- **Member Management**: Core `Member` model and `Application` workflow for joining the party.
- **Identity & Authentication**: User roles (Super Admin, Branch/District Admin) and OTP-based verification.

## 🎨 Phase 2: Public Interface & Branding (Completed)
- **Core Pages**: Implementation of History, Ideology, Leadership, and Office Bearers pages.
- **Dynamic Content**: Press Releases, Latest News, Events, and Media Gallery.
- **Engagement Tools**: Modern "Join Party" application form and Donation system.
- **SEO & Meta**: Initial implementation of SEO services and title tags.

## ⚙️ Phase 3: Administrative Excellence (Ongoing)
- [x] **Dynamic Settings**: Centrally manageable system for Social Media, Contact Info, and Global SEO.
- [x] **CRUD Refinement**: Verified Article and Media management in the admin panel.
- [/] **Mobile Responsiveness**: Optimizing Filament list views and resources for mobile admins.
- [/] **Location Logic**: Fixing branch/district selection for Super Admins during member creation.
- [ ] **Data Export**: PDF generation for member applications and identity cards (Production Fixes).

## 🚀 Phase 4: Infrastructure & Stability (Done/Ongoing)
- [x] **Deployment**: Successful deployment to Hostinger via Dokploy and Vercel for API.
- [x] **Database Fixes**: Resolved production connection errors (`php_network_getaddresses`).
- [x] **API Debugging**: Fixed 405 Method Not Allowed and "Bad Gateway" errors.
- [x] **Storage**: Implemented storage links and permission fixes for file uploads.

## ✨ Phase 5: Polishing & Final Launch (Next Steps)
- [ ] **SEO Content Audit**: Replace hardcoded SEO tags with dynamic settings across all 30+ public pages.
- [ ] **Interactive Features**: Refine the landing page booking/booking flow (if applicable to transport wing).
- [ ] **Performance**: Cache optimization and asset minification for production performance.
- [ ] **User Documentation**: Create a manual for District Admins on managing local applications.
- [ ] **Final QA**: End-to-end testing of the member onboarding flow on multiple devices.
