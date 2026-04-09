<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    :root {
        --p-x: 30px;
    }



    .main-area {
        width: 100%;
        overflow-x: hidden;
        position: relative;
    }
</style>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px var(--p-x); position: sticky; top: 0; z-index: 1000;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">Operational Registry</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Monitor client-wise shipment lifecycles across global ports</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div class="hide-mobile" style="text-align: right; border-right: 1px solid #f1f5f9; padding-right: 20px;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Registry Sync</p>
                <p style="font-size: 10px; color: #10b981; font-weight: 800; margin: 0;">LIVE • 200 OK</p>
            </div>
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 13px; font-weight: 700; padding: 10px 25px; border-radius: 8px;">BACK</button>
        </div>
    </header>
    <div class="content-padding" style="padding: 30px var(--p-x);">
        <style>
            .filter-input-group {
                transition: all 0.2s;
                border: 1.5px solid #e2e8f0;
                border-radius: 8px;
                background: #fff;
                position: relative;
            }

            .filter-input-group:focus-within {
                border-color: #000;
            }

            .filter-input-group input {
                width: 100%;
                border: none;
                outline: none;
                background: transparent;
                padding: 12px 12px 12px 48px;
                font-size: 13px;
                font-weight: 600;
            }

            .filter-input-group i {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: #64748b;
                font-size: 14px;
                pointer-events: none;
            }

            input::-webkit-calendar-picker-indicator {
                opacity: 0;
                cursor: pointer;
                position: absolute;
                right: 10px;
                z-index: 10;
                width: 20px;
                height: 20px;
            }

            @media (max-width: 768px) {
                .search-filter-hub {
                    grid-template-columns: 1fr !important;
                }
            }
        </style>

        <!-- Search & Filter Hub (Fixed Responsiveness & Gap) -->
        <div class="search-filter-hub" style="display: grid; grid-template-columns: 1fr 240px; gap: 15px; margin-bottom: 40px; background: #f8fafc; padding: 15px; border-radius: 12px; border: 1.5px solid #f1f5f9;">
            <div class="filter-input-group">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Client, Container or Reference...">
            </div>
            <div class="filter-input-group">
                <i class="fa-solid fa-calendar-alt"></i>
                <input type="date" value="2026-05-16" style="font-weight: 850;">
                <i class="fa-solid fa-chevron-down" style="left: auto; right: 16px; font-size: 10px; color: #94a3b8;"></i>
            </div>
        </div>

        <!-- 16th MAY Group (CURRENT DATA TOP) -->
        <div style="margin-bottom: 50px;">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 24px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                <h3 style="font-size: 13px; font-weight: 950; color: #1e293b; margin: 0; text-transform: uppercase; letter-spacing: 1px;">Saturday, 16 May 2026</h3>
                <span style="font-size: 10px; font-weight: 800; color: #10b981;">CURRENT • 6 PROJECTS ACTIVE</span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(min(100%, 280px), 1fr)); gap: 20px;">
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0;">RAYSUT CEMENT</h4>
                        <span style="font-size: 8px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 3px 8px; border-radius: 4px; border: 1px solid #dbeafe;">DOCK FLOW</span>
                    </div>
                    <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-bottom: 12px;">SEA EXPORT • SALALAH</p>
                    
                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <span style="font-size: 9px; font-weight: 800; color: #64748b; letter-spacing: 0.5px;">STAGE 02/04</span>
                            <span style="font-size: 9px; font-weight: 900; color: var(--primary);">GATE-IN</span>
                        </div>
                        <div style="height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                            <div style="width: 50%; height: 100%; background: var(--primary); border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="job-details.php?type=dock" class="btn" style="display: block; text-align: center; text-decoration: none; padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">DOCK AUDIT</a>
                </div>
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0;">OMAN TRADING CO</h4>
                        <span style="font-size: 8px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 3px 8px; border-radius: 4px; border: 1px solid #ffedd5;">FACTORY FLOW</span>
                    </div>
                    <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-bottom: 12px;">DOMESTIC LOGISTICS</p>

                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <span style="font-size: 9px; font-weight: 800; color: #64748b; letter-spacing: 0.5px;">STAGE 03/04</span>
                            <span style="font-size: 9px; font-weight: 900; color: #ea580c;">STUFFING</span>
                        </div>
                        <div style="height: 6px; background: #fff7ed; border-radius: 10px; overflow: hidden;">
                            <div style="width: 75%; height: 100%; background: #ea580c; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="job-details.php?type=factory" class="btn" style="display: block; text-align: center; text-decoration: none;padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">FACTORY AUDIT</a>
                </div>
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0;">GLOBAL MARITIME</h4>
                        <span style="font-size: 8px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 3px 8px; border-radius: 4px; border: 1px solid #dbeafe;">DOCK FLOW</span>
                    </div>
                    <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-bottom: 12px;">SEA IMPORT • MUNDRA</p>

                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <span style="font-size: 9px; font-weight: 800; color: #64748b; letter-spacing: 0.5px;">STAGE 02/05</span>
                            <span style="font-size: 9px; font-weight: 900; color: var(--primary);">GATE-OUT</span>
                        </div>
                        <div style="height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                            <div style="width: 40%; height: 100%; background: var(--primary); border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="job-details.php?type=dock" class="btn" style="display: block; text-align: center; text-decoration: none;padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">DOCK AUDIT</a>
                </div>
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff; border-left: 4px solid #fbfbfbff;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0;">PETROLEUM OMAN</h4>
                        <span style="font-size: 8px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 3px 8px; border-radius: 4px; border: 1px solid #ffedd5;">FACTORY FLOW</span>
                    </div>
                    <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-bottom: 12px;">SPECIAL CARGO • HAZMAT</p>

                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <span style="font-size: 9px; font-weight: 800; color: #64748b; letter-spacing: 0.5px;">STAGE 01/04</span>
                            <span style="font-size: 9px; font-weight: 900; color: #ea580c;">DOCS READY</span>
                        </div>
                        <div style="height: 6px; background: #fff7ed; border-radius: 10px; overflow: hidden;">
                            <div style="width: 25%; height: 100%; background: #ea580c; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="job-details.php?type=factory" class="btn" style="display: block; text-align: center; text-decoration: none; padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.2);">FACTORY AUDIT</a>
                </div>

                <!-- ADDED IMPORT MODELS -->
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0;">AL-FAJR LOGISTICS</h4>
                        <span style="font-size: 8px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 3px 8px; border-radius: 4px; border: 1px solid #ffedd5;">FACTORY FLOW</span>
                    </div>
                    <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-bottom: 12px;">SEA IMPORT • FACTORY DE-STUFFING</p>

                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <span style="font-size: 9px; font-weight: 800; color: #64748b; letter-spacing: 0.5px;">STAGE 04/05</span>
                            <span style="font-size: 9px; font-weight: 900; color: #ea580c;">STUFFING</span>
                        </div>
                        <div style="height: 6px; background: #fff7ed; border-radius: 10px; overflow: hidden;">
                            <div style="width: 80%; height: 100%; background: #ea580c; border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="import/factory/vessel-arrival.php" class="btn" style="display: block; text-align: center; text-decoration: none; padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">FACTORY AUDIT</a>
                </div>
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0;">MARITIME SERVICES</h4>
                        <span style="font-size: 8px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 3px 8px; border-radius: 4px; border: 1px solid #dbeafe;">DOCK FLOW</span>
                    </div>
                    <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-bottom: 12px;">SEA IMPORT • DOCK DE-STUFFING</p>

                    <div style="margin-bottom: 18px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <span style="font-size: 9px; font-weight: 800; color: #64748b; letter-spacing: 0.5px;">STAGE 03/05</span>
                            <span style="font-size: 9px; font-weight: 900; color: var(--primary);">GATE-IN</span>
                        </div>
                        <div style="height: 6px; background: #f1f5f9; border-radius: 10px; overflow: hidden;">
                            <div style="width: 60%; height: 100%; background: var(--primary); border-radius: 10px;"></div>
                        </div>
                    </div>

                    <a href="import/gate-in-cfs.php" class="btn" style="display: block; text-align: center; text-decoration: none; padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">DOCK AUDIT</a>
                </div>
            </div>
        </div>

        <!-- 15th MAY Group -->
        <div style="margin-bottom: 50px;">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 24px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                <h3 style="font-size: 13px; font-weight: 950; color: #1e293b; margin: 0; text-transform: uppercase; letter-spacing: 1px;">Friday, 15 May 2026</h3>
                <span style="font-size: 10px; font-weight: 800; color: #94a3b8;">COMPLETED • 4 PARTIES</span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(min(100%, 280px), 1fr)); gap: 20px;">
                <!-- Card 1 -->
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0; color: #0f172a;">AL-FALAK TRADING</h4>
                        <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 4px;">
                            <span style="font-size: 9px; font-weight: 850; background: #eff6ff; color: #2563eb; padding: 2px 6px; border-radius: 4px;">FAC-24-005</span>
                            <span style="font-size: 7px; font-weight: 950; color: #ea580c; text-transform: uppercase; letter-spacing: 0.5px;">FACTORY FLOW</span>
                        </div>
                    </div>
                    <p style="font-size: 11px; color: #64748b; font-weight: 600; margin: 0;">SEA EXPORT • MUNDRA PORT</p>
                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px dashed #e2e8f0;">
                        <a href="job-details.php?type=factory" class="btn" style="display: block; text-align: center; text-decoration: none;padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">FACTORY AUDIT</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0; color: #0f172a;">GLOBAL LOGIX OMAN</h4>
                        <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 4px;">
                            <span style="font-size: 9px; font-weight: 850; background: #eff6ff; color: #2563eb; padding: 2px 6px; border-radius: 4px;">EXP-24-001</span>
                            <span style="font-size: 7px; font-weight: 950; color: #2563eb; text-transform: uppercase; letter-spacing: 0.5px;">DOCK FLOW</span>
                        </div>
                    </div>
                    <p style="font-size: 11px; color: #64748b; font-weight: 600; margin: 0;">AIR EXPORT • MUSCAT AIRPORT</p>
                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px dashed #e2e8f0;">
                        <a href="job-details.php?type=dock" class="btn" style="display: block; text-align: center; text-decoration: none;padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">DOCK AUDIT</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0; color: #0f172a;">NEXUS TRANSPORT</h4>
                        <span style="font-size: 9px; font-weight: 850; background: #f1f5f9; color: #64748b; padding: 4px 8px; border-radius: 4px;">DOM-24-012</span>
                    </div>
                    <p style="font-size: 11px; color: #64748b; font-weight: 600; margin: 0;">ROAD TRANSPORT • INTERNAL</p>
                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px dashed #e2e8f0;">
                        <a href="job-details.php?type=factory" class="btn" style="display: block; text-align: center; text-decoration: none;padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">IN TRANSIT</a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="card" style="padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                        <h4 style="font-size: 14px; font-weight: 800; margin: 0; color: #0f172a;">OMAN CEMENT CO.</h4>
                        <span style="font-size: 9px; font-weight: 850; background: #f1f5f9; color: #64748b; padding: 4px 8px; border-radius: 4px;">U-RRG-44</span>
                    </div>
                    <p style="font-size: 11px; color: #64748b; font-weight: 600; margin: 0;">BULK IMPORT • SOHAR PORT</p>
                    <div style="margin-top: 20px; padding-top: 15px; border-top: 1px dashed #e2e8f0;">
                        <a href="job-details.php?type=dock" class="btn" style="display: block; text-align: center; text-decoration: none; padding: 12px; font-size: 13px; font-weight: 700; background: #2563eb; color: #fff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);">COMPLETED</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const assignBtn = document.getElementById('assign-btn');
        if (assignBtn) {
            assignBtn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Work Assigned!',
                    text: 'Job successfully delegated to Rahul Sharma (Senior Operations). Operational metadata has been synced.',
                    icon: 'success',
                    confirmButtonText: 'Track Workflow',
                    confirmButtonColor: '#2563eb',
                    showCancelButton: true,
                    cancelButtonText: 'Stay Here'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'work-assignment.php';
                    }
                });
            });
        }
    });
</script>

<?php include 'includes/footer.php'; ?>