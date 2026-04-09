<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Data for View
$client = [
    'name' => 'Anatolia Operations Team',
    'company_name' => 'ANATOLIA TILE & STONE',
    'email' => 'ops@anatolia.ca',
    'contact_1' => '+1 (905) 555-0123',
    'contact_2' => '+1 (905) 555-0124',
    'gst_no' => '24AAACA1234A1Z5',
    'address' => '8300 Huntington Rd, Vaughan, ON L4H 4Z5, Canada',
    'status' => 'VERIFIED',
    'total_shipments' => 24,
    'last_active' => '16 MAY 2026'
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

    body {
        overflow-x: hidden;
        width: 100%;
    }

    .main-area {
        width: 100%;
        overflow-x: hidden;
        position: relative;
    }

    .view-section {
        background: #fff;
        border: 1.5px solid #f1f5f9;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
    }

    .view-label {
        display: block;
        font-size: 10px;
        font-weight: 850;
        color: #94a3b8;
        text-transform: uppercase;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .view-value {
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .stat-box {
        background: #f8fafc;
        padding: 20px;
        border-radius: 8px;
        border: 1.5px solid #f1f5f9;
    }
</style>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="index.php" style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #64748b; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px; display: flex; align-items: center; gap: 10px;">
                    <?php echo $client['company_name']; ?>
                    <span style="font-size: 8px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 3px 8px; border-radius: 4px; border: 1px solid #dcfce7; vertical-align: middle;">VERIFIED</span>
                </h1>
                <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Corporate Partner Profile • Registered Mar 2024</p>
            </div>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="edit.php" class="btn" style="background: var(--primary); color: #fff; font-size: 13px; font-weight: 850; padding: 12px 30px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-pen-to-square"></i> EDIT PROFILE
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <div style="display: grid; grid-template-columns: 1fr 320px; gap: 30px; align-items: start;">
            <!-- Left: Full Metadata -->
            <div>
                <div class="view-section">
                    <h3 style="font-size: 13px; font-weight: 950; color: #1e293b; margin-bottom: 25px; border-bottom: 2px solid #f8fafc; padding-bottom: 15px; text-transform: uppercase;"><i class="fa-solid fa-building" style="margin-right: 10px; color: #3b82f6;"></i> Company Identification</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                        <div>
                            <span class="view-label">Full Client Account Name</span>
                            <p class="view-value"><?php echo $client['name']; ?></p>
                        </div>
                        <div>
                            <span class="view-label">GSTIN / Tax Reference</span>
                            <p class="view-value" style="color: #2563eb;"><?php echo $client['gst_no']; ?></p>
                        </div>
                        <div style="grid-column: span 2;">
                            <span class="view-label">Global Head Office Address</span>
                            <p class="view-value" style="line-height: 1.6;"><?php echo $client['address']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="view-section">
                    <h3 style="font-size: 13px; font-weight: 950; color: #1e293b; margin-bottom: 25px; border-bottom: 2px solid #f8fafc; padding-bottom: 15px; text-transform: uppercase;"><i class="fa-solid fa-address-book" style="margin-right: 10px; color: #3b82f6;"></i> Communication Channels</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                        <div>
                            <span class="view-label">Primary Communication Email</span>
                            <p class="view-value"><?php echo $client['email']; ?></p>
                        </div>
                        <div>
                            <span class="view-label">International Access Numbers</span>
                            <p class="view-value"><?php echo $client['contact_1']; ?> <span style="color: #94a3b8;">/</span> <?php echo $client['contact_2']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="view-section" style="border: 1.5px solid #000; background: #fff;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 style="font-size: 13px; font-weight: 950; color: #000; margin: 0; text-transform: uppercase;">Recent Shipment History</h3>
                        <a href="../job-assign-slip.php" style="font-size: 10px; font-weight: 850; color: #2563eb; text-decoration: none;">VIEW ALL RECORDS <i class="fa-solid fa-chevron-right" style="margin-left: 5px;"></i></a>
                    </div>
                    <div style="display: grid; gap: 12px;">
                        <a href="/admin/job-assign-slip.php" style="text-decoration: none; padding: 15px; background: #f8fafc; border: 1.5px solid #f1f5f9; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; transition: all 0.2s;" onmouseover="this.style.borderColor='#cbd5e1'; this.style.background='#fff'" onmouseout="this.style.borderColor='#f1f5f9'; this.style.background='#f8fafc'">
                            <div>
                                <p style="font-size: 11px; font-weight: 950; color: #01172a; margin-bottom: 4px;">EXP-24-001 • MSC GULSUN</p>
                                <p style="font-size: 10px; color: #64748b; font-weight: 700; margin: 0;">MUNDRA -> SALALAH • 16 MAY 2026</p>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 4px 10px; border-radius: 4px; border: 1px solid #ffedd5;">FACTORY FLOW</span>
                        </a>
                        <a href="../job-assign-slip.php" style="text-decoration: none; padding: 15px; background: #f8fafc; border: 1.5px solid #f1f5f9; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; transition: all 0.2s;" onmouseover="this.style.borderColor='#cbd5e1'; this.style.background='#fff'" onmouseout="this.style.borderColor='#f1f5f9'; this.style.background='#f8fafc'">
                            <div>
                                <p style="font-size: 11px; font-weight: 950; color: #01172a; margin-bottom: 4px;">EXP-24-005 • OMAN PRIDE</p>
                                <p style="font-size: 10px; color: #64748b; font-weight: 700; margin: 0;">SOHAR -> MUNDRA • 15 MAY 2026</p>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 4px; border: 1px solid #dbeafe;">DOCK FLOW</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Account Stats -->
            <div>
                <div class="view-section" style="background: #fff; border: 1.5px solid #f1f5f9;">
                    <h4 style="font-size: 10px; font-weight: 850; color: #1e293b; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 0.5px; border-bottom: 1px solid #f8fafc; padding-bottom: 10px;">Operational Intelligence</h4>
                    <div style="display: grid; gap: 15px;">
                        <div class="stat-box">
                            <span class="view-label">Total Shipments Initiated</span>
                            <p class="view-value" style="font-size: 24px; font-weight: 950; color: var(--primary);"><?php echo $client['total_shipments']; ?></p>
                        </div>
                        <div class="stat-box">
                            <span class="view-label">Last Activity Registered</span>
                            <p class="view-value" style="font-size: 16px; font-weight: 850;"><?php echo $client['last_active']; ?></p>
                        </div>
                        <div class="stat-box">
                            <span class="view-label">Credit Line Status</span>
                            <p class="view-value" style="color: #16a34a; font-size: 14px; font-weight: 950;"><i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> ACTIVE ELIGIBLE</p>
                        </div>
                    </div>
                </div>

                <div class="view-section" style="border: 1.5px solid #f1f5f9; background: #f8fafc;">
                    <h4 style="font-size: 10px; font-weight: 850; color: #475569; text-transform: uppercase; margin-bottom: 15px;">Administrative Actions</h4>
                    <button class="btn" style="width: 100%; padding: 12px; font-size: 11px; font-weight: 850; background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; border-radius: 6px; margin-bottom: 10px;">EXPORT CLIENT LEDGER</button>
                    <button class="btn" style="width: 100%; padding: 12px; font-size: 11px; font-weight: 850; background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; border-radius: 6px;">GENERATE TAX DSR</button>
                    <button class="btn" style="width: 100%; padding: 12px; font-size: 11px; font-weight: 850; background: #fff; border: 1.5px solid #ef4444; color: #ef4444; border-radius: 6px; margin-top: 20px;">RESTRICT ACCOUNT</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>