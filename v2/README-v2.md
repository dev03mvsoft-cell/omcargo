# Oman Cargo Movers - New Web Application UI/UX Plan (V2 Root-Based)

## 1. Vision & Strategy
The V2 UI is built on a separate, optimized root structure to ensure modern, high-performance web experience without legacy constraints.

- **Design Essence**: Premium Glassmorphic Minimalist.
- **Root Path**: `/v2/`
- **Design Tokens**: Defined in `/v2/assets/css/style.css`.

## 2. Updated User Roles
### Admin Power Role
- Full control over Export/Import flows.
- Real-time management of Job User Names (Clients).
- Advanced analytics & report generation.

### Client Power Role (User)
- Personalized tracking for assigned jobs.
- High-quality document access.
- Stage-by-stage visual feedback.

## 3. Workflow Implementation

### A. Strategic Job Creation
- Features a **Client Account Selection (Job User Name)** which determines accessibility and billing.
- Auto-generation of Job Numbers based on Modality (EXP/IMP), Year, and Sequence.

### B. Export Flow (Strategic 8-Stage Dock Stuffing)
1. **Invoice Receipt**: Financial initiation.
2. **Custom Checklist**: Regulatory verification.
3. **Cargo Arrival**: Inflow tracking.
4. **CFS Assignment**: Logistic mapping.
5. **Daily Carting**: Ongoing haulage logs.
6. **Container & Booking**: Final logistical units.
7. **Gate-In**: Port terminal handover.
8. **Onboard**: Strategic export completion.

## 4. Technical Roadmap
1. **Infrastructure**: Establish root `/v2/` assets and base HTML.
2. **Operational Pages**: Job creation and workflow monitoring.
3. **Client Access**: Role-based redirection and dashboard.
4. **Final Integration**: Real-time sync with database/backend storage.
