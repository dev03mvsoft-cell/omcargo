<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Data for Editing
$staff = [
    'name' => 'Ahmed Raza',
    'id' => 'OMC-STF-442',
    'role' => 'FLEET SUPERVISOR',
    'contact_1' => '+968 9455 1200',
    'contact_2' => '+968 7811 3455',
    'address' => 'Street No 44, Matrah, Muscat, Oman',
    'branch' => 'MUSCAT HEAD OFFICE',
    'join_date' => '2025-01-16'
];
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root { --p-x: 30px; }
    @media (max-width: 768px) { :root { --p-x: 15px; } }
    .main-area { background: #f8fafc; min-height: 100vh; }
    .form-section { background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 30px; margin-bottom: 30px; }
    .form-label { display: block; font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.5px; }
    .form-control { width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 13px; font-weight: 700; color: #01172a; outline: none; transition: all 0.2s; background: #fff; }
    .form-control:focus { border-color: #000; box-shadow: 0 0 0 3px rgba(0,0,0,0.03); }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Update Personnel Credentials</h2>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">Modifying professional profile for <?php echo $staff['name']; ?></p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 12px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">CANCEL</button>
            <button type="submit" form="staff-edit-form" class="btn" style="background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; padding: 10px 30px; border-radius: 6px; border: none; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">UPDATE PERSONNEL PROFILE</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="staff-edit-form" action="index.php" method="POST">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; align-items: start;">
                <!-- Left: Identity & Contact -->
                <div>
                    <div class="form-section">
                        <h3 style="font-size: 14px; font-weight: 950; color: #01172a; margin: 0 0 25px 0; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 15px;">Personnel Data Core</h3>
                        
                        <div style="display: grid; grid-template-columns: 1fr; gap: 25px;">
                            <div class="form-group">
                                <label class="form-label">Legal Full Name</label>
                                <input type="text" name="full_name" class="form-control" value="<?php echo $staff['name']; ?>" required>
                            </div>

                            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Professional Role</label>
                                    <select class="form-control" required>
                                        <option <?php echo ($staff['role'] == 'OPERATIONS MANAGER') ? 'selected' : ''; ?>>OPERATIONS MANAGER</option>
                                        <option <?php echo ($staff['role'] == 'FLEET SUPERVISOR') ? 'selected' : ''; ?>>FLEET SUPERVISOR</option>
                                        <option <?php echo ($staff['role'] == 'CONTAINER INSPECTOR') ? 'selected' : ''; ?>>CONTAINER INSPECTOR</option>
                                        <option <?php echo ($staff['role'] == 'DOCUMENTATION CLERK') ? 'selected' : ''; ?>>DOCUMENTATION CLERK</option>
                                        <option <?php echo ($staff['role'] == 'LOGISTICS COORDINATOR') ? 'selected' : ''; ?>>LOGISTICS COORDINATOR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Employee ID (STF)</label>
                                    <input type="text" class="form-control" value="<?php echo $staff['id']; ?>" readonly style="background: #f8fafc; color: #94a3b8; border-style: dashed;">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Primary Connect Number</label>
                                    <input type="tel" name="contact_1" class="form-control" value="<?php echo $staff['contact_1']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Emergency Connect Node</label>
                                    <input type="tel" name="contact_2" class="form-control" value="<?php echo $staff['contact_2']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Residential Hub Address (HQ/Base)</label>
                                <textarea name="address" class="form-control" rows="3" style="resize: none;"><?php echo $staff['address']; ?></textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: Audit Summary -->
                <div>
                    <div class="form-section" style="padding: 24px; background: #fafafa; border: 1.5px solid #000;">
                        <h4 style="font-size: 10px; font-weight: 950; color: #000; text-transform: uppercase; margin-bottom: 15px;">Field Verification Audit</h4>
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 750; color: #01172a;">Verified Identity Document</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 750; color: #01172a;">Safety Protocol Certified</span>
                            </label>
                        </div>
                        <div style="margin-top: 25px; padding-top: 15px; border-top: 1px dashed #e2e8f0;">
                            <p style="font-size: 9px; font-weight: 950; color: #94a3b8; margin: 0;">LAST AUDITED</p>
                            <p style="font-size: 11px; font-weight: 800; color: #475569; margin: 4px 0 0 0;">ADMIN • 1 HOUR AGO</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
