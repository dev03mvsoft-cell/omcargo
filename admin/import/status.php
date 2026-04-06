<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .dock-hub { padding: 40px; background: #fff; }
    
    .dock-hub { padding: 40px; background: #fff; }
    
    /* 14-Step Status Hub */
    .status-hub-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 15px; margin-bottom: 40px; }
    .status-hub-item { padding: 15px 10px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 10px; text-align: center; cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; }
    .status-hub-item:hover { transform: translateY(-3px); border-color: var(--primary); box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.1); }
    .status-hub-item.completed { background: #f0fdf4; border-color: #10b981; }
    .status-hub-item.active { background: #eff6ff; border-color: #2563eb; box-shadow: 0 0 0 2px #dbeafe; }
    .status-hub-item.pending { opacity: 0.6; }
    
    .status-hub-icon { font-size: 18px; margin-bottom: 8px; color: #94a3b8; }
    .status-hub-item.completed .status-hub-icon { color: #10b981; }
    .status-hub-item.active .status-hub-icon { color: #2563eb; }
    
    .status-hub-title { font-size: 8px; font-weight: 850; color: #475569; text-transform: uppercase; display: block; line-height: 1.2; }
    .status-hub-item.active .status-hub-title { color: #1d4ed8; }
    
    .status-hub-badge { position: absolute; top: 5px; right: 5px; font-size: 7px; font-weight: 950; padding: 2px 5px; border-radius: 100px; }
    .badge-completed { background: #10b981; color: #fff; }
    .badge-active { background: #2563eb; color: #fff; }
    
    /* Summary Matrix */
    .matrix-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; margin-bottom: 40px; }
    .matrix-item { padding: 20px; background: #fff; border: 1.5px solid #f1f5f9; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
    .m-label { font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 6px; letter-spacing: 0.5px; }
    .m-value { font-size: 15px; font-weight: 900; color: #01172a; }

    /* De-stuffing Table */
    .op-table { width: 100%; border-collapse: collapse; border: 1px solid var(--primary); }
    .op-table th { padding: 12px; background: var(--primary); color: #fff; font-size: 10px; font-weight: 800; text-transform: uppercase; text-align: left; }
    .op-table td { padding: 12px; border: 1px solid #e2e8f0; font-size: 11px; font-weight: 700; color: #1e293b; }
    
    .data-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 30px; margin-top: 30px; }
    .status-pill { padding: 4px 12px; border-radius: 4px; font-size: 9px; font-weight: 900; text-transform: uppercase; background: #f1f5f9; color: #64748b; }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px; position: sticky; top: 0; z-index: 1000;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Import Dock De-stuffing Hub</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">OCM-IMP-24-001 | TERMINAL PORT: MUNDRA</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='../work-assignment.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">CANCEL</button>
            <button onclick="saveDockStatus()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 850; background: var(--primary); color: #fff; border: none;">SAVE DE-STUFFING LOG</button>
        </div>
    </header>

    <div class="dock-hub">
        <!-- 1. 14-Step Logistics Status Hub -->
        <?php 
        $steps = [
            ["title" => "B/L Received", "icon" => "fa-file-invoice"],
            ["title" => "Vessel Arrival", "icon" => "fa-ship"],
            ["title" => "Container Discharged", "icon" => "fa-truck-loading"],
            ["title" => "Port Yard", "icon" => "fa-warehouse"],
            ["title" => "Gate Out (Port)", "icon" => "fa-door-open"],
            ["title" => "Gate In (CFS)", "icon" => "fa-truck-ramp-box"],
            ["title" => "BOE Filed (CHA)", "icon" => "fa-file-signature"],
            ["title" => "Customs Clearance", "icon" => "fa-gavel"],
            ["title" => "De-stuffing (CFS)", "icon" => "fa-box-open"],
            ["title" => "Cargo Segregation", "icon" => "fa-layer-group"],
            ["title" => "Delivery Order", "icon" => "fa-file-circle-check"],
            ["title" => "Truck Loading", "icon" => "fa-truck-front"],
            ["title" => "Out for Delivery", "icon" => "fa-road"],
            ["title" => "Delivered", "icon" => "fa-house-circle-check"]
        ];
        $current_index = 8; // De-stuffing (CFS) is current
        ?>
        <div style="margin-bottom: 40px; background: #f8fafc; padding: 30px; border-radius: 15px; border: 1.5px solid #e2e8f0;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <div>
                    <h3 style="font-size: 14px; font-weight: 900; color: #01172a; text-transform: uppercase; margin: 0;">Operational Movement Lifecycle</h3>
                    <p style="font-size: 10px; color: #64748b; font-weight: 600; margin-top: 4px;">Real-time tracking across 14 logistics checkpoints</p>
                </div>
                <div style="text-align: right;">
                    <span style="font-size: 11px; font-weight: 950; color: var(--primary);"><?php echo round((($current_index + 1) / count($steps)) * 100); ?>% COMPLETED</span>
                </div>
            </div>

            <!-- Enhanced Horizontal Progress Bar -->
            <div style="position: relative; margin-bottom: 40px; padding: 0 10px;">
                <div style="height: 6px; background: #e2e8f0; border-radius: 100px; position: relative;">
                    <div style="position: absolute; left: 0; top: 0; height: 100%; width: <?php echo ($current_index / (count($steps)-1)) * 100; ?>%; background: var(--primary); border-radius: 100px; transition: width 1s ease;"></div>
                    
                    <?php foreach($steps as $i => $step): 
                        $class = 'pending';
                        if($i < $current_index) $class = 'completed';
                        elseif($i == $current_index) $class = 'active';
                        
                        $left = ($i / (count($steps)-1)) * 100;
                    ?>
                    <div style="position: absolute; left: <?php echo $left; ?>%; top: 50%; transform: translate(-50%, -50%); width: 12px; height: 12px; background: <?php echo $class == 'completed' ? 'var(--primary)' : ($class == 'active' ? 'var(--primary)' : '#fff'); ?>; border: 2px solid <?php echo $class == 'pending' ? '#cbd5e1' : 'var(--primary)'; ?>; border-radius: 50%; z-index: 2;">
                        <?php if($class == 'active'): ?>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 24px; height: 24px; background: rgba(37, 99, 235, 0.2); border-radius: 50%; animation: pulse 2s infinite;"></div>
                        <?php endif; ?>
                        
                        <!-- Mini Title below -->
                        <div style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 7px; font-weight: 850; color: <?php echo $class == 'pending' ? '#94a3b8' : '#01172a'; ?>; text-transform: uppercase; <?php if($i % 2 != 0) echo 'top: -25px;'; ?>">
                            <?php echo $step['title']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Quick Action Grid -->
            <div class="status-hub-grid" style="margin-top: 50px;">
                <?php foreach($steps as $i => $step): 
                    $class = 'pending';
                    if($i < $current_index) $class = 'completed';
                    elseif($i == $current_index) $class = 'active';
                ?>
                <div class="status-hub-item <?php echo $class; ?>" onclick="updateGlobalStatus(<?php echo $i; ?>)">
                    <?php if($class == 'completed'): ?>
                        <span class="status-hub-badge badge-completed"><i class="fa-solid fa-check"></i></span>
                    <?php elseif($class == 'active'): ?>
                        <span class="status-hub-badge badge-active">ACTIVE</span>
                    <?php endif; ?>
                    <div class="status-hub-icon"><i class="fa-solid <?php echo $step['icon']; ?>"></i></div>
                    <span class="status-hub-title"><?php echo $step['title']; ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 2. Matrix Grid -->
        <div class="matrix-grid">
            <div class="matrix-item">
                <span class="m-label">Vessel Ref</span>
                <span class="m-value">URANUS V.2443S</span>
            </div>
            <div class="matrix-item">
                <span class="m-label">Total Containers</span>
                <span class="m-value">05 Units (40FT)</span>
            </div>
            <div class="matrix-item">
                <span class="m-label">Stripping Weight</span>
                <span class="m-value" style="color: var(--primary);">110,210 KGS</span>
            </div>
            <div class="matrix-item">
                <span class="m-label">Current Status</span>
                <div style="margin-top: 5px;"><span class="status-pill" style="background: var(--primary-light); color: var(--primary);">IN PROGRESS</span></div>
            </div>
        </div>

        <!-- 3. De-stuffing Manifest Logs -->
        <div class="data-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 style="font-size: 13px; font-weight: 900; color: #01172a; text-transform: uppercase;"><i class="fa-solid fa-truck-ramp-box"></i> Dock Unloading Records</h3>
                <button class="btn" style="font-size: 10px; font-weight: 800; border: 1.5px solid var(--primary); background: var(--primary); color: #fff; padding: 5px 15px;"><i class="fa-solid fa-plus"></i> ADD LOG</button>
            </div>

            <table class="op-table">
                <thead>
                    <tr>
                        <th width="150">Container No</th>
                        <th width="120">Seal ID</th>
                        <th width="100">Bags Unloaded</th>
                        <th width="110">Act. Weight</th>
                        <th width="150">Auditor Name</th>
                        <th width="150">Condition</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color: #2563eb;">TEMU8169950</td>
                        <td>B163979</td>
                        <td><input type="number" value="880" class="input-simple" style="font-weight: 950; border: none; background: transparent;"></td>
                        <td><input type="text" value="22,044" class="input-simple" style="font-weight: 950; border: none; background: transparent;"></td>
                        <td>Rahul Sharma</td>
                        <td><span class="status-pill" style="background: #ecfdf5; color: #059669;">SEAL INTACT</span></td>
                        <td align="center"><i class="fa-solid fa-camera" style="color: #3b82f6; cursor: pointer;"></i></td>
                    </tr>
                    <tr>
                        <td style="color: #2563eb;">MSCU9982116</td>
                        <td>B161932</td>
                        <td><input type="number" value="0" class="input-simple" style="font-weight: 950; border: none; background: transparent;"></td>
                        <td><input type="text" value="0" class="input-simple" style="font-weight: 950; border: none; background: transparent;"></td>
                        <td>Rahul Sharma</td>
                        <td><span class="status-pill">WAITING...</span></td>
                        <td align="center"><i class="fa-solid fa-camera" style="color: #3b82f6; cursor: pointer;"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    function updateGlobalStatus(index) {
        Swal.fire({
            title: 'Update Journey Phase?',
            text: 'Are you sure you want to advance this shipment movement status?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: 'var(--primary)',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Yes, Update Status'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Updated!', 'The shipment has moved to the next logistics phase.', 'success');
            }
        });
    }

    function saveDockStatus() {
        Swal.fire({
            title: 'Logs Secured',
            text: 'Import de-stuffing logs have been saved to server. Moving to Tally verification.',
            icon: 'success',
            confirmButtonColor: 'var(--primary)',
            confirmButtonText: 'View Work Board'
        }).then(() => {
            window.location.href = '../work-assignment.php';
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>
