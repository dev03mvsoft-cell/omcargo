<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Data for View
$transport = [
    'name' => 'AL-Maha Logistics',
    'id' => 'OMC-TRNS-8820',
    'email' => 'ops@almaha-oman.net',
    'contact_1' => '+968 2455 1200',
    'contact_2' => '+968 9911 3455',
    'address' => 'Bldg 441, Al-Khuwair, Muscat, Oman',
    'category' => 'PREMIUM PARTNER',
    'route' => 'Muscat - Salalah',
    'trucks' => '24',
    'total_trips' => '842',
    'success_rate' => '99.4%',
    'rating' => '4.8',
    'verified' => true,
    'insurance' => true
];
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root { --p-x: 30px; }
    @media (max-width: 768px) { :root { --p-x: 15px; } }
    .main-area { background: #f8fafc; min-height: 100vh; }
    .profile-card { background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px; margin-bottom: 30px; }
    .stat-box { background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 8px; padding: 15px; text-align: center; }
    .label-pill { font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; background: #f1f5f9; padding: 4px 10px; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="index.php" style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #64748b; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;"><?php echo $transport['name']; ?></h2>
                <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">ID: <?php echo $transport['id']; ?> • TRANSPORT PARTNER PROFILE</p>
            </div>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="edit.php" class="btn" style="background: #000; color: #fff; font-size: 13px; font-weight: 850; padding: 12px 30px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-pen-to-square"></i> CONFIGURE PARTNER
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <div style="display: grid; grid-template-columns: 1fr 320px; gap: 30px;">
            <div>
                <!-- Primary Profile -->
                <div class="profile-card">
                    <h3 style="font-size: 15px; font-weight: 950; color: #01172a; margin: 0 0 25px 0; border-bottom: 1px dashed #e2e8f0; padding-bottom: 15px;">Corporate Node Analysis</h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                        <div>
                            <span class="label-pill">Primary Contact Gateway</span>
                            <p style="font-size: 14px; font-weight: 850; color: #1e293b; margin: 0;"><?php echo $transport['email']; ?></p>
                            <p style="font-size: 12px; font-weight: 750; color: #64748b; margin: 8px 0 0 0;">
                                <i class="fa-solid fa-phone" style="margin-right: 8px; font-size: 10px;"></i><?php echo $transport['contact_1']; ?>
                            </p>
                            <p style="font-size: 12px; font-weight: 750; color: #64748b; margin: 4px 0 0 0;">
                                <i class="fa-solid fa-phone" style="margin-right: 8px; font-size: 10px;"></i><?php echo $transport['contact_2']; ?>
                            </p>
                        </div>
                        <div>
                            <span class="label-pill">Infrastructure Location</span>
                            <p style="font-size: 13px; font-weight: 800; color: #1e293b; margin: 0; line-height: 1.5;"><?php echo $transport['address']; ?></p>
                            <a href="#" style="font-size: 10px; font-weight: 950; color: #2563eb; text-decoration: none; display: inline-block; margin-top: 10px; text-transform: uppercase;">VIEW ON LOGISTICS MAP <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>

                    <div style="margin-top: 35px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px;">
                        <div class="stat-box">
                            <p style="font-size: 9px; font-weight: 950; color: #94a3b8; margin: 0 0 5px 0;">TOTAL MISSIONS</p>
                            <p style="font-size: 16px; font-weight: 950; color: #01172a; margin: 0;"><?php echo $transport['total_trips']; ?></p>
                        </div>
                        <div class="stat-box">
                            <p style="font-size: 9px; font-weight: 950; color: #94a3b8; margin: 0 0 5px 0;">KTI PERFORMANCE</p>
                            <p style="font-size: 16px; font-weight: 950; color: #10b981; margin: 0;"><?php echo $transport['success_rate']; ?></p>
                        </div>
                        <div class="stat-box">
                            <p style="font-size: 9px; font-weight: 950; color: #94a3b8; margin: 0 0 5px 0;">TRUCK STRENGTH</p>
                            <p style="font-size: 16px; font-weight: 950; color: #3b82f6; margin: 0;"><?php echo $transport['trucks']; ?></p>
                        </div>
                        <div class="stat-box">
                            <p style="font-size: 9px; font-weight: 950; color: #94a3b8; margin: 0 0 5px 0;">PARTNER RATING</p>
                            <p style="font-size: 16px; font-weight: 950; color: #f59e0b; margin: 0;"><?php echo $transport['rating']; ?> <i class="fa-solid fa-star" style="font-size: 12px;"></i></p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="profile-card">
                    <h3 style="font-size: 15px; font-weight: 950; color: #01172a; margin: 0 0 20px 0;">Fleet Operational Logs</h3>
                    <div style="display: flex; flex-direction: column; gap: 1px; background: #e2e8f0; border: 1.5px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
                        <?php for($i=1; $i<=4; $i++): ?>
                        <div style="background: #fff; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <p style="font-size: 11px; font-weight: 850; color: #1e293b; margin: 0;">#<?php echo rand(10000, 99999); ?> • JOB ASSIGNMENT</p>
                                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; margin: 4px 0 0 0;">SEA EXPORT / CONTAINER STUFFING</p>
                            </div>
                            <div style="text-align: right;">
                                <span style="font-size: 9px; font-weight: 900; color: #10b981; text-transform: uppercase;">DELIVERED</span>
                                <p style="font-size: 9px; font-weight: 700; color: #64748b; margin: 4px 0 0 0;">16 MAY 2026</p>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div>
                <!-- Compliance Sidebar -->
                <div class="profile-card" style="padding: 24px;">
                    <h4 style="font-size: 11px; font-weight: 950; color: #94a3b8; text-transform: uppercase; margin-bottom: 20px;">Safety & Verification</h4>
                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: #f0fdf4; border: 1px solid #dcfce7; border-radius: 8px;">
                            <i class="fa-solid fa-certificate" style="color: #16a34a; font-size: 16px;"></i>
                            <div>
                                <p style="font-size: 10px; font-weight: 950; color: #16a34a; margin: 0;">COMMERCIAL LICENSE</p>
                                <p style="font-size: 9px; font-weight: 750; color: #16a34a; opacity: 0.8; margin: 2px 0 0 0;">VALID UNTIL DEC 2027</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: #f0fdf4; border: 1px solid #dcfce7; border-radius: 8px;">
                            <i class="fa-solid fa-shield-halved" style="color: #16a34a; font-size: 16px;"></i>
                            <div>
                                <p style="font-size: 10px; font-weight: 950; color: #16a34a; margin: 0;">INSURANCE STATUS</p>
                                <p style="font-size: 9px; font-weight: 750; color: #16a34a; opacity: 0.8; margin: 2px 0 0 0;">FULLY COVERED (PREMIUM)</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px; padding: 20px; background: #01172a; border-radius: 12px; color: #fff;">
                        <p style="font-size: 9px; font-weight: 900; opacity: 0.6; text-transform: uppercase; margin-bottom: 8px;">Fleet Manager Insight</p>
                        <p style="font-size: 12px; font-weight: 700; line-height: 1.5; margin: 0;">Strong partner for Muscat-UAE cross-border transit. High-density fleet available for weekends.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
