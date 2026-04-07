<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';

// Mock Personnel List for Selection
$staff_list = [
    ['name' => 'Ahmed Raza', 'id' => 'STF-001'],
    ['name' => 'Salim Khan', 'id' => 'STF-002'],
    ['name' => 'Zaid Ali', 'id' => 'STF-003'],
    ['name' => 'Mustafa Khan', 'id' => 'STF-004']
];

$modules = [
    ['name' => 'Job Management', 'desc' => 'Job creation and Export/Import life-cycle'],
    ['name' => 'Commodity Manifest', 'desc' => 'Cargo details and item lists'],
    ['name' => 'Client Management', 'desc' => 'Customer profiles and contact data'],
    ['name' => 'Transport Partners', 'desc' => 'Logistics network and fleet registry'],
    ['name' => 'Personnel Management', 'desc' => 'Staff profiles and internal contact info'],
    ['name' => 'Security & Roles', 'desc' => 'System access control and registry']
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

    .assign-card {
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

    .matrix-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .matrix-table th {
        background: #f8fafc;
        padding: 15px 20px;
        text-align: left;
        font-size: 10px;
        font-weight: 950;
        color: #64748b;
        text-transform: uppercase;
        border-bottom: 1.5px solid #e2e8f0;
    }

    .matrix-table td {
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .perm-toggle {
        width: 40px;
        height: 20px;
        background: #e2e8f0;
        border-radius: 20px;
        position: relative;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-block;
    }

    .perm-toggle::after {
        content: '';
        position: absolute;
        width: 14px;
        height: 14px;
        background: #fff;
        border-radius: 50%;
        top: 3px;
        left: 3px;
        transition: all 0.3s;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .perm-checkbox {
        display: none;
    }

    .perm-checkbox:checked+.perm-toggle {
        background: var(--primary);
    }

    .perm-checkbox:checked+.perm-toggle::after {
        left: 23px;
    }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="index.php" style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #64748b; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Unified Permission Assignment</h2>
                <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase;">Assigning Role & Job Permissions</p>
            </div>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 850; padding: 12px 25px; border-radius: 8px;">CANCEL</button>
            <button type="submit" form="assign-form" class="btn" style="background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; padding: 14px 40px; border-radius: 8px; border: none; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">SAVE & ENFORCE PERMISSIONS</button>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <form id="assign-form" action="index.php" method="POST">
            <!-- Part 1: Personnel Identity -->
            <div class="assign-card">
                <h3 style="font-size: 14px; font-weight: 950; color: #1e293b; margin: 0 0 25px 0; border-bottom: 2px solid #f8fafc; padding-bottom: 15px;">1. Personnel & Role Selection</h3>

                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 25px;">
                    <div class="form-group">
                        <label class="form-label">Select Employee Name</label>
                        <select class="form-control" name="employee_id" required>
                            <option value="">SEARCH PERSONNEL FOR ASSIGNMENT...</option>
                            <?php foreach ($staff_list as $staff): ?>
                                <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?> (<?php echo $staff['id']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Professional Role Designation</label>
                        <select class="form-control" name="role" required>
                            <option value="">SELECT SYSTEM ROLE TYPE...</option>
                            <option>OPERATIONS MANAGER</option>
                            <option>FLEET SUPERVISOR</option>
                            <option>CONTAINER INSPECTOR</option>
                            <option>DOCUMENTATION CLERK</option>
                            <option>LOGISTICS COORDINATOR</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Part 2: Permission Matrix -->
            <div class="assign-card">
                <h3 style="font-size: 14px; font-weight: 950; color: #1e293b; margin: 0 0 25px 0; border-bottom: 2px solid #f8fafc; padding-bottom: 15px;">2. Module Access Matrix (Granular Permissions)</h3>

                <div style="background: #fff; border: 1px solid #f1f5f9; border-radius: 8px; overflow: hidden;">
                    <table class="matrix-table">
                        <thead>
                            <tr>
                                <th style="width: 350px;">System Module / Mission Gate</th>
                                <th style="text-align: center;">View / Read</th>
                                <th style="text-align: center;">Create / Write</th>
                                <th style="text-align: center;">Edit / Update</th>
                                <th style="text-align: center;">Delete / Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modules as $mod): ?>
                                <tr>
                                    <td>
                                        <p style="font-size: 14px; font-weight: 900; color: #01172a; margin: 0;"><?php echo $mod['name']; ?></p>
                                        <p style="font-size: 10px; font-weight: 700; color: #94a3b8; margin: 4px 0 0 0;"><?php echo $mod['desc']; ?></p>
                                    </td>
                                    <!-- View -->
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="perm-checkbox" checked>
                                            <span class="perm-toggle"></span>
                                        </label>
                                    </td>
                                    <!-- Create -->
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="perm-checkbox" checked>
                                            <span class="perm-toggle"></span>
                                        </label>
                                    </td>
                                    <!-- Edit -->
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="perm-checkbox">
                                            <span class="perm-toggle"></span>
                                        </label>
                                    </td>
                                    <!-- Delete -->
                                    <td style="text-align: center;">
                                        <label>
                                            <input type="checkbox" class="perm-checkbox">
                                            <span class="perm-toggle"></span>
                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Part 3: Deployment Notice -->
            <div style="padding: 25px; background: #eef2ff; border: 1.5px solid #e0e7ff; border-radius: 12px; display: flex; align-items: center; gap: 20px;">
                <div style="width: 50px; height: 50px; background: #c7d2fe; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; color: #4338ca;">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <p style="font-size: 14px; font-weight: 950; color: #3730a3; margin: 0;">Operational Impact Summary</p>
                    <p style="font-size: 12px; font-weight: 700; color: #4338ca; margin-top: 4px; line-height: 1.5;">Saving this profile will instantly apply these access rights to the employee's system ID. All login tokens will be refreshed to reflect the new security boundary.</p>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>