<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
?>
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 9px; font-weight: 850; color: #3b82f6; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 4px;">OPERATIONAL REGISTRY: INBOUND LOGISTICS</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 950; margin: 0; letter-spacing: -0.7px;">Import Terminal Registry</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Real-time De-stuffing & Grounding Status Index</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <button type="button" onclick="window.location.href='job-create.php'" class="btn" style="background: #000; color: #fff; font-size: 11px; font-weight: 850; padding: 12px 30px; border-radius: 10px; border: none; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);"><i class="fa-solid fa-plus"></i> NEW INBOUND JOB</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 40px var(--p-x);">
        
        <!-- TERMINAL METRICS -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 40px;">
            <div style="background: #fff; border: 1.5px solid #f1f5f9; padding: 25px; border-radius: 16px;">
                <p style="font-size: 10px; font-weight: 950; color: #94a3b8; margin: 0; text-transform: uppercase;">AWAITING GROUNDING</p>
                <h2 style="font-size: 28px; font-weight: 950; color: #01172a; margin: 8px 0;">12</h2>
                <div style="width: 40px; height: 3px; background: #3b82f6; border-radius: 10px;"></div>
            </div>
            <div style="background: #fff; border: 1.5px solid #f1f5f9; padding: 25px; border-radius: 16px;">
                <p style="font-size: 10px; font-weight: 950; color: #94a3b8; margin: 0; text-transform: uppercase;">DE-STUFFING ACTIVE</p>
                <h2 style="font-size: 28px; font-weight: 950; color: #01172a; margin: 8px 0;">08</h2>
                <div style="width: 40px; height: 3px; background: #10b981; border-radius: 10px;"></div>
            </div>
            <div style="background: #fff; border: 1.5px solid #f1f5f9; padding: 25px; border-radius: 16px;">
                <p style="font-size: 10px; font-weight: 950; color: #94a3b8; margin: 0; text-transform: uppercase;">REPORTED DAMAGE</p>
                <h2 style="font-size: 28px; font-weight: 950; color: #ef4444; margin: 8px 0;">02</h2>
                <div style="width: 40px; height: 3px; background: #ef4444; border-radius: 10px;"></div>
            </div>
            <div style="background: #fff; border: 1.5px solid #f1f5f9; padding: 25px; border-radius: 16px;">
                <p style="font-size: 10px; font-weight: 950; color: #94a3b8; margin: 0; text-transform: uppercase;">DISPATCHED TODAY</p>
                <h2 style="font-size: 28px; font-weight: 950; color: #6366f1; margin: 8px 0;">45</h2>
                <div style="width: 40px; height: 3px; background: #6366f1; border-radius: 10px;"></div>
            </div>
        </div>

        <!-- SEARCH HUB -->
        <div style="background: #fff; border: 1.5px solid #f1f5f9; border-radius: 16px; padding: 20px 30px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; gap: 20px; align-items: center; flex: 1;">
                <i class="fa-solid fa-magnifying-glass" style="color: #cbd5e1;"></i>
                <input type="text" placeholder="Search by B/L No, Vessel, or Container..." style="border: none; outline: none; font-size: 12px; font-weight: 700; width: 100%; color: #01172a;">
            </div>
            <div style="display: flex; gap: 15px;">
                <button class="btn" style="background: #f8fafc; border: 1.5px solid #f1f5f9; color: #64748b; font-size: 10px; font-weight: 850; padding: 8px 15px; border-radius: 8px;">FILTER: ALL VESSELS</button>
                <button class="btn" style="background: #f8fafc; border: 1.5px solid #f1f5f9; color: #64748b; font-size: 10px; font-weight: 850; padding: 8px 15px; border-radius: 8px;"><i class="fa-solid fa-download"></i> EXPORT XLS</button>
            </div>
        </div>

        <!-- REGISTRY GRID -->
        <div style="background: #fff; border: 1.5px solid #f1f5f9; border-radius: 16px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #f8fafc; border-bottom: 1.5px solid #f1f5f9;">
                    <tr>
                        <th style="padding: 20px; text-align: left; font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px;">B/L Reconciliation Details</th>
                        <th style="padding: 20px; text-align: center; font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase;">Terminal Asset</th>
                        <th style="padding: 20px; text-align: center; font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase;">De-stuffing Status</th>
                        <th style="padding: 20px; text-align: center; font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase;">Grounding Loc</th>
                        <th style="padding: 20px; text-align: right; font-size: 10px; font-weight: 950; color: #94a3b8; text-transform: uppercase;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mock_jobs = [
                        ['bl' => 'BL123456789', 'vessel' => 'MSC GRACE V.245', 'cnt' => 'MSKU1234567', 'status' => 'GROUNDED', 'loc' => 'XYZ CFS', 'damage' => 'NIL'],
                        ['bl' => 'BL987654321', 'vessel' => 'MAERSK SEOUL V.11', 'cnt' => 'MRKU9876543', 'status' => 'IN_PROGRESS', 'loc' => 'MUNDRA YARD', 'damage' => 'REPORTED'],
                        ['bl' => 'BL456789123', 'vessel' => 'COSCO SHIPPING V.88', 'cnt' => 'CSQU4567891', 'status' => 'DISPATCHED', 'loc' => 'DIRECT DELV', 'damage' => 'NIL'],
                    ];

                    foreach ($mock_jobs as $job):
                        $status_color = ($job['status'] == 'GROUNDED') ? '#3b82f6' : (($job['status'] == 'IN_PROGRESS') ? '#10b981' : '#64748b');
                        $damage_badge = ($job['damage'] == 'REPORTED') ? '<span style="font-size: 8px; font-weight: 950; padding: 2px 6px; background: #fee2e2; color: #ef4444; border-radius: 4px; margin-left: 8px;">DAMAGE</span>' : '';
                    ?>
                    <tr style="border-bottom: 1.5px solid #f8fafc; transition: background 0.2s; cursor: pointer;" onmouseover="this.style.background='#fcfdfe'" onmouseout="this.style.background='white'">
                        <td style="padding: 20px;">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: #3b82f6;"><i class="fa-solid fa-file-invoice"></i></div>
                                <div>
                                    <p style="font-size: 13px; font-weight: 850; color: #01172a; margin: 0;"><?php echo $job['bl']; ?></p>
                                    <p style="font-size: 10px; font-weight: 600; color: #94a3b8; margin: 4px 0 0;"><?php echo $job['vessel']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td align="center">
                            <p style="font-size: 11px; font-weight: 950; color: #01172a; margin: 0; background: #f8fafc; padding: 6px 12px; border-radius: 6px; display: inline-block; border: 1px solid #f1f5f9;"><?php echo $job['cnt']; ?></p>
                        </td>
                        <td align="center">
                            <div style="display: flex; flex-direction: column; align-items: center; gap: 5px;">
                                <span style="font-size: 10px; font-weight: 950; color: <?php echo $status_color; ?>; padding: 4px 12px; background: <?php echo $status_color; ?>15; border-radius: 20px; border: 1px solid <?php echo $status_color; ?>30;"><?php echo str_replace('_', ' ', $job['status']); ?></span>
                                <?php echo $damage_badge; ?>
                            </div>
                        </td>
                        <td align="center">
                            <p style="font-size: 11px; font-weight: 800; color: #64748b; margin: 0;"><i class="fa-solid fa-location-dot" style="margin-right: 5px; color: #cbd5e1;"></i> <?php echo $job['loc']; ?></p>
                        </td>
                        <td align="right" style="padding: 20px;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <button class="btn" style="width: 35px; height: 35px; border-radius: 10px; border: 1.5px solid #f1f5f9; background: #fff; color: #64748b; font-size: 12px;"><i class="fa-solid fa-eye"></i></button>
                                <button class="btn" style="width: 35px; height: 35px; border-radius: 10px; border: 1.5px solid #f1f5f9; background: #fff; color: #3b82f6; font-size: 12px;"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn" style="width: 35px; height: 35px; border-radius: 10px; background: #000; color: #fff; font-size: 12px; border: none;"><i class="fa-solid fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
            <p style="font-size: 11px; font-weight: 700; color: #94a3b8;">Showing 1 - 3 of 65 terminal entries</p>
            <div style="display: flex; gap: 5px;">
                <button class="btn" style="width: 35px; height: 35px; border-radius: 8px; border: 1.5px solid #f1f5f9; background: #fff; color: #94a3b8; font-size: 12px;"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="btn" style="width: 35px; height: 35px; border-radius: 8px; background: #000; color: #fff; font-size: 12px; font-weight: 950; border: none;">1</button>
                <button class="btn" style="width: 35px; height: 35px; border-radius: 8px; border: 1.5px solid #f1f5f9; background: #fff; color: #64748b; font-size: 12px; font-weight: 950;">2</button>
                <button class="btn" style="width: 35px; height: 35px; border-radius: 8px; border: 1.5px solid #f1f5f9; background: #fff; color: #94a3b8; font-size: 12px;"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    console.log('Import Registry: Terminal Sync Active');
});
</script>

<?php include '../includes/footer.php'; ?>
