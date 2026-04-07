<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Data for Editing
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
    'verified' => true,
    'insurance' => true
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

    .form-section {
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
    }

    .form-label {
        display: block;
        font-size: 11px;
        font-weight: 800;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #01172a;
        outline: none;
        transition: all 0.2s;
        background: #fff;
    }

    .form-control:focus {
        border-color: #000;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.03);
    }

    .btn-save {
        background: var(--primary);
        color: #fff;
        border: none;
        font-size: 12px;
        font-weight: 850;
        padding: 12px 30px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
    }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Update Partner Credentials</h2>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">Modifying legal and operational data for <?php echo $transport['name']; ?></p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 12px; font-weight: 800; padding: 10px 20px; border-radius: 6px;">CANCEL AUDIT</button>
            <button type="submit" form="transport-edit-form" class="btn-save">PUBLISH TRANSPORT UPDATES</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="transport-edit-form" action="index.php" method="POST">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; align-items: start;">
                <!-- Left: Primary Details -->
                <div>
                    <div class="form-section">
                        <h3 style="font-size: 14px; font-weight: 900; color: #01172a; margin: 0 0 25px 0; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 15px;">Corporate Core Nodes</h3>

                        <div style="display: grid; grid-template-columns: 1fr; gap: 25px;">
                            <div class="form-group">
                                <label class="form-label">Transport Company Name</label>
                                <input type="text" name="company_name" class="form-control" value="<?php echo $transport['name']; ?>" required>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Commercial Hub Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $transport['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">FLEET ID (READ-ONLY)</label>
                                    <input type="text" class="form-control" value="<?php echo $transport['id']; ?>" readonly style="background: #f8fafc; color: #94a3b8; border-style: dashed;">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label">Contact Node 01 (Primary)</label>
                                    <input type="tel" name="contact_1" class="form-control" value="<?php echo $transport['contact_1']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact Node 02 (Standby)</label>
                                    <input type="tel" name="contact_2" class="form-control" value="<?php echo $transport['contact_2']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Registered Office Address</label>
                                <textarea name="address" class="form-control" rows="3" style="resize: none;"><?php echo $transport['address']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 style="font-size: 14px; font-weight: 900; color: #01172a; margin: 0 0 25px 0; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 15px;">Fleet Infrastructure</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                            <div class="form-group">
                                <label class="form-label">Partner Category</label>
                                <select class="form-control">
                                    <option <?php echo ($transport['category'] == 'REGULAR CARRIER') ? 'selected' : ''; ?>>REGULAR CARRIER</option>
                                    <option <?php echo ($transport['category'] == 'PREMIUM PARTNER') ? 'selected' : ''; ?>>PREMIUM PARTNER</option>
                                    <option <?php echo ($transport['category'] == 'OVER-SIZE CARRIER') ? 'selected' : ''; ?>>OVER-SIZE CARRIER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Primary Route</label>
                                <input type="text" class="form-control" value="<?php echo $transport['route']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Truck Limit</label>
                                <input type="number" class="form-control" value="<?php echo $transport['trucks']; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Meta/Status -->
                <div>
                    <div class="form-section" style="padding: 20px; background: #fafafa; border: 1.5px solid #000;">
                        <h4 style="font-size: 10px; font-weight: 950; color: #000; text-transform: uppercase; margin-bottom: 15px;">Current Audit State</h4>
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" <?php echo $transport['verified'] ? 'checked' : ''; ?> style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #01172a;">Verified Commercial License</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" <?php echo $transport['insurance'] ? 'checked' : ''; ?> style="accent-color: #000;">
                                <span style="font-size: 11px; font-weight: 700; color: #01172a;">Active Insurance Bond</span>
                            </label>
                        </div>
                        <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
                            <p style="font-size: 9px; font-weight: 950; color: #94a3b8; margin: 0;">LAST UPDATED</p>
                            <p style="font-size: 11px; font-weight: 800; color: #475569; margin: 4px 0 0 0;">SYSTEM • 2 HOURS AGO</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>