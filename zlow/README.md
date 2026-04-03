# Oman Cargo Mover

## Overview
Oman Cargo Mover is a premium logistics and freight management web application acting as a Master Console Hub. It offers a comprehensive operational dashboard for administrators to manage global cargo movements securely, while providing clients with a dedicated portal for live tracking and documentation.

## Project Structure
The repository is systematically divided into three main operational domains:

- `/admin`: The primary operator console.
  - `/admin/dashboard`: In-depth analytical views, fleet movements, and system health.
  - `/admin/jobs`: Complete Job Management workflow. Contains specialized directories for **Dock Process** (Booking, Carting, Gate-In, Line, On-Board) and **Factory Process** (Manifest, Invoices).
  - `/admin/clients`: Client KYC, directory, and onboarding.
  - `/admin/vendors`: Management of Transport Directories and Shipping Lines.
  - `/admin/settings`: System hub controlling employee roles, permissions, and configurations.
- `/client`: The Customer Portal. Features Live Tracking (`live-tracking.html`), active shipments, and document retrieval.
- `/auth`: Login interfaces controlling access to the portals.

## User Interface (UI) Design n/310m
The system is built on modern web standards emphasizing a sleek, responsive, and dynamic interface.

### Technology Stack
- **HTML5:** Semantic architecture.
- **Tailwind CSS (CDN):** Utility-first CSS framework heavily utilized for responsive design, auto-adjusting layouts, and typography.
- **JavaScript Component Libraries:** Uses `SweetAlert2` for alerts, dialogs, and modals, and incorporates `chart.js` for analytical elements.
- **Fonts & Typography:** `Public Sans` for a clean, structural layout.
- **Icons:** Google `Material Symbols Outlined` are used universally across the UI for consistency.

### UI Principles & Aesthetics
- **Glassmorphism:** Employs the highly modern `.glass-card` approach (semi-transparent backgrounds `bg-white/70`, `backdrop-blur-xl`, subtle borders, and soft shadows) to establish a premium look.
- **Dark Mode Ready:** Built with Tailwind's `dark:` modifier ensuring full compatibility with system dark themes.
- **Dynamic Micro-Interactions:** Uses `hover:scale`, pulsing indicators, and shimmering loaders (`.animate-shimmer`) to create an application that feels alive and responsive to user interaction.
- **Visual Hierarchy:** Heavy use of uppercase, tracked-out text elements for section labelings (e.g., tracking steps), coupled with bold numerical statistics.

## Operational Workflow

### 1. Job Creation (`/admin/jobs/create/index.html`)
The logistics lifecycle begins at the Job Creation interface.
- **Initialization:** Operators select Job Type (EXPORT/IMPORT) and Process Type (DOCK STUFFING vs. FACTORY STUFFING).
- **Client & Context:** Pulls data for Client, Shipper, Consignee, along with precise maritime data (Shipping Line, Vessel/Voyage, Port of Loading/Discharge).
- **Cargo Ledger:** Dynamic input tables for Goods (Items, HSN, Quantity, Rates calculating USD and INR equivalents).
- **Documentation & Assignment:** Prompts for necessary file attachments. On submission, a modal (`SweetAlert2`) requires the assignment of an Operations Lead before finalization.

### 2. Execution & Process Tracking
Once live, jobs manifest in the respective process pipeline:
- Jobs filter into `/admin/jobs/dock-process/` or `/admin/jobs/factory-process/`.
- Tasks such as *Carting*, *Customs Checklist*, and *Gate-In* are processed systematically by the assigned Operations Lead.

### 3. Master Console Monitoring (`/index.html`)
- Supervisors monitor "Team Workload & Assignments" in real-time.
- Progress bars show exact completion percentages (e.g., "75% Complete - Documentation Verification").
- Provides a centralized view of all Active Jobs, Total Clients, Active Roles, and Revenue details.

### 4. Client Transparency (`/client/index.html`)
- Clients (e.g., Reliance Industries) log into their isolated portal.
- Features a **Live Tracking Feed** showing exact granular steps with interactive Steppers (e.g., *Factory Stuffing &rarr; Port Gate In &rarr; Out for Delivery*).
- Allows clients zero-friction access to download verified paperwork (Bills of Lading, Invoices) via the Quick Documents panel.
