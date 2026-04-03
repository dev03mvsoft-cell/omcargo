# Oman Cargo Movers - New Web Application UI/UX Plan

## 1. Vision & Aesthetics
The new Oman Cargo Movers application will feature a **premium, state-of-the-art interface** designed for maximum operational efficiency and visual excellence.

- **Design System**: 
  - **Typography**: Inter / Outfit (Modern, high readability).
  - **Color Palette**: 
    - `Primary`: Deep Royal Blue (`#1e40af`) for Export.
    - `Secondary`: Emerald Green (`#059669`) for Success/Completed stages.
    - `Accent`: Amber (`#d97706`) for Pending/Active tasks.
    - `Background`: High-contrast Slate-950 for Dark Mode; Clean, paper-white for Light Mode.
  - **Aesthetics**: Glassmorphism, subtle micro-animations (hover transitions, progress bar fills), and depth using soft shadows.

## 2. Updated User Roles
### 3.1 Admin Role
- **Dashboard**: Global operational view with real-time tracking.
- **Job Control**: Create/Edit jobs with unique Job IDs.
- **Client/User Management**: Associate jobs with specific "Job User Names" (Clients).
- **Operational Data**: Input for all 8 export stages and 4 import stages.

### 3.2 Client (User) Role
- **Restricted View**: Can only see jobs assigned to their specific "Job User Name".
- **Tracking**: Visual timeline shows progress (e.g., Stage 3 of 8).
- **Documents**: Direct download of invoices, checklists, and onboard docs.

## 3. Core Workflow Implementation (New UI Components)

### A. Job Creation Page (High Priority)
- **Multi-Source Client Selection**: Dropdown/Search for existing clients.
- **Field: Job User Name**: A mandatory field to associate the job for client-side visibility.
- **Job Identification**: Auto-generated sequence (`OCM-EXP-2024-XXXX`).
- **Dynamic Form**: Selecting "Export" vs "Import" instantly updates the process type options and required initial fields.

### B. Export Operational Hub
#### Dock Stuffing (8 Stages)
1. **Invoice**: Document upload + financial basics.
2. **Customs**: Checklist system with visual "Pass/Fail" indicators.
3. **Arrival**: Cargo weight and vehicle entry.
4. **CFS**: Warehouse assignment details.
5. **Carting**: Multi-entry table for truck movements.
6. **Booking**: Container details (size, seal, vessel).
7. **Gate-In**: Real-time terminal entry tracking.
8. **Onboard**: Confirmation of vessel departure.

#### Factory Stuffing (4 Stages)
1. **Booking**: Container and truck assignment.
2. **Invoice**: Goods description and value.
3. **Gate-In**: Factory-to-Port movement.
4. **Onboard**: Export completion.

## 4. Technical Architecture
- **Frontend**: Vanilla HTML5, JavaScript (ES6+), and CSS3 with custom design tokens.
- **Components**: Reusable card components for job status, progress bars for timelines, and searchable data tables.
- **Navigation**: Persistent sidebar with role-aware links and a global header with search/notifications.

## 5. Next Steps (Development Order)
1. **[ ] Foundation**: Update global `index.css` with the new design system (colors, typography, grid).
2. **[ ] Auth**: Premium Login page for both Admin and Client.
3. **[ ] Job Creation**: Implement the updated "Create Job" form with "Job User Name" field.
4. **[ ] Progress Tracking**: Develop the "Mission Control" timeline UI for both Export and Import processes.
