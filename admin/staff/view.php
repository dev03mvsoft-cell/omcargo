<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Data for View
$staff = [
    'name' => 'Ahmed Raza',
    'id' => 'OMC-STF-442',
    'role' => 'FLEET SUPERVISOR',
    'contact_1' => '+968 9455 1200',
    'contact_2' => '+968 7811 3455',
    'address' => 'Street No 44, Matrah, Muscat, Oman',
    'branch' => 'MUSCAT HEAD OFFICE',
    'join_date' => '16 Jan 2025',
    'jobs_managed' => '124',
    'accuracy' => '98.5%',
    'status' => 'ACTIVE'
];
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root {
        --p-x: 30px;
    }

    @media (max-width: 768px) {
        :root {
            --p-x: 15px;
        }
    }

    .main-area {
        background: #f8fafc;
        min-height: 100vh;
    }

    .profile-card {
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
    }

    .stat-box {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
    }

    .label-pill {
        font-size: 10px;
        font-weight: 850;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: #f1f5f9;
        padding: 4px 10px;
        border-radius: 4px;
        display: inline-block;
        margin-bottom: 10px;
    }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="index.php" style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #64748b; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;"><?php echo $staff['name']; ?></h2>
                <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">ID: <?php echo $staff['id']; ?> • PERSONNEL PROFILE AUDIT</p>
            </div>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="edit.php" class="btn" style="background: var(--primary);  color: #fff; font-size: 13px; font-weight: 850; padding: 12px 30px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-user-gear"></i> MODIFY CREDENTIALS
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <div style="display: grid; grid-template-columns: 1fr 340px; gap: 30px;">
            <div>
                <!-- Primary Identity Card -->
                <div class="profile-card">
                    <h3 style="font-size: 15px; font-weight: 950; color: #01172a; margin: 0 0 25px 0; border-bottom: 1px dashed #e2e8f0; padding-bottom: 15px;">Personnel Identity Core</h3>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                        <div>
                            <span class="label-pill">Connect Nodes</span>
                            <p style="font-size: 14px; font-weight: 850; color: #1e293b; margin: 0;"><?php echo $staff['contact_1']; ?></p>
                            <p style="font-size: 12px; font-weight: 750; color: #64748b; margin: 8px 0 0 0;">
                                <i class="fa-solid fa-phone-slash" style="margin-right: 8px; font-size: 10px;"></i>Emergency: <?php echo $staff['contact_2']; ?>
                            </p>
                        </div>
                        <div>
                            <span class="label-pill">Residential Base</span>
                            <p style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 0; line-height: 1.5;"><?php echo $staff['address']; ?></p>
                            <span style="font-size: 10px; font-weight: 950; color: #6366f1; text-transform: uppercase; margin-top: 10px; display: inline-block; cursor: pointer;">LOCATE ON LOGISTICS GRID <i class="fa-solid fa-location-crosshairs"></i></span>
                        </div>
                    </div>

                    <div style="margin-top: 35px; border-top: 1.5px solid #f1f5f9; padding-top: 25px;">
                        <p style="font-size: 11px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Employee Status Summary</p>
                        <p style="font-size: 13px; font-weight: 700; color: #475569; margin-top: 10px;">The personnel profile is active and verified for logistics coordination. No further operational performance metrics are tracked in this view.</p>
                    </div>
                </div>
            </div>

            <div>
                <!-- Compliance & Profile State -->
                <div class="profile-card" style="padding: 24px;">
                    <div style="text-align: center; margin-bottom: 25px;">
                        <div style="width: 80px; height: 80px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 900; color: #475569; border: 3px solid #e2e8f0; margin: 0 auto 15px auto;">AR</div>
                        <h4 style="font-size: 16px; font-weight: 900; color: #01172a; margin: 0;"><?php echo $staff['name']; ?></h4>
                        <p style="font-size: 10px; font-weight: 850; color: #6366f1; text-transform: uppercase; margin-top: 4px;"><?php echo $staff['role']; ?></p>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: #f0fdf4; border: 1px solid #dcfce7; border-radius: 8px;">
                            <i class="fa-solid fa-id-card-clip" style="color: #16a34a; font-size: 16px;"></i>
                            <div>
                                <p style="font-size: 10px; font-weight: 950; color: #16a34a; margin: 0;">IDENTITY VERIFIED</p>
                                <p style="font-size: 9px; font-weight: 750; color: #16a34a; opacity: 0.8; margin: 2px 0 0 0;">SYSTEM CHECK PASSED</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: #f0fdf4; border: 1px solid #dcfce7; border-radius: 8px;">
                            <i class="fa-solid fa-user-shield" style="color: #16a34a; font-size: 16px;"></i>
                            <div>
                                <p style="font-size: 10px; font-weight: 950; color: #16a34a; margin: 0;">SAFETY CERTIFIED</p>
                                <p style="font-size: 9px; font-weight: 750; color: #16a34a; opacity: 0.8; margin: 2px 0 0 0;">EXP: JUN 2027</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px; padding: 20px; background: #01172a; border-radius: 12px; color: #fff;">
                        <p style="font-size: 9px; font-weight: 900; opacity: 0.6; text-transform: uppercase; margin-bottom: 8px;">Operations Sentiment</p>
                        <p style="font-size: 12px; font-weight: 700; line-height: 1.5; margin: 0;">Highly reliable for container stuffing supervision. Primary point of contact for Salalah hub deployments.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>