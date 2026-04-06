<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root { --p-x: 30px; }
    @media (max-width: 768px) { :root { --p-x: 15px; } }
    .main-area { background: #f8fafc; min-height: 100vh; }
    .card { transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); border: 1.5px solid #e2e8f0; }
    .card:hover { transform: translateY(-3px); box-shadow: 0 12px 20px -5px rgba(0,0,0,0.05); border-color: #000; }
    .status-badge { font-size: 8px; font-weight: 950; padding: 3px 8px; border-radius: 4px; text-transform: uppercase; border: 1px solid transparent; }
    .badge-admin { background: #fef2f2; color: #ef4444; border-color: #fee2e2; }
    .badge-standard { background: #f0f9ff; color: #0369a1; border-color: #e0f2fe; }
    .badge-limited { background: #f8fafc; color: #64748b; border-color: #e2e8f0; }
</style>

<main class="main-area">
    <!-- Header Strategy -->
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Role & Permission Management</h2>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase; letter-spacing: 0.5px;">System Access Registry</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <a href="assign.php" class="btn" style="background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; padding: 12px 25px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                <i class="fa-solid fa-plus"></i> ASSIGN JOB PERMISSION
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <!-- Search & Filter Hub -->
        <div class="search-filter-hub" style="display: grid; grid-template-columns: 1fr 280px; gap: 20px; margin-bottom: 30px;">
            <div style="transition: all 0.2s; border: 1.5px solid #e2e8f0; border-radius: 8px; background: #fff; position: relative;">
                <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 14px;"></i>
                <input type="text" placeholder="Search Personnel or Access Level..." style="width: 100%; border: none; outline: none; background: transparent; padding: 14px 14px 14px 48px; font-size: 13px; font-weight: 600;">
            </div>
            <select style="border: 1.5px solid #e2e8f0; border-radius: 8px; background: #fff; padding: 0 15px; font-size: 11px; font-weight: 850; outline: none; appearance: none;">
                <option>ALL SYSTEM ROLES</option>
                <option>OPERATIONS MANAGER</option>
                <option>FLEET SUPERVISOR</option>
                <option>INSPECTOR / CLERK</option>
            </select>
        </div>

        <!-- Access Table -->
        <div style="background: #fff; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1.5px solid #e2e8f0;">
                        <th style="padding: 20px; text-align: left; font-size: 10px; font-weight: 950; color: #64748b; text-transform: uppercase;">Employee Identity</th>
                        <th style="padding: 20px; text-align: left; font-size: 10px; font-weight: 950; color: #64748b; text-transform: uppercase;">System Role</th>
                        <th style="padding: 20px; text-align: left; font-size: 10px; font-weight: 950; color: #64748b; text-transform: uppercase;">Permissions Summary</th>
                        <th style="padding: 20px; text-align: center; font-size: 10px; font-weight: 950; color: #64748b; text-transform: uppercase;">Security Level</th>
                        <th style="padding: 20px; text-align: right; font-size: 10px; font-weight: 950; color: #64748b; text-transform: uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mock_staff = [
                        ['name' => 'Ahmed Raza', 'role' => 'Operations Manager', 'rights' => 'Jobs (RW), Manifest (RW), Clients (R)', 'badge' => 'badge-standard', 'level' => 'STANDARD'],
                        ['name' => 'Salim Khan', 'role' => 'Fleet Supervisor', 'rights' => 'Jobs (R), Manifest (R)', 'badge' => 'badge-limited', 'level' => 'LIMITED'],
                        ['name' => 'Super Administrator', 'role' => 'Root Access', 'rights' => 'Full System (RW+)', 'badge' => 'badge-admin', 'level' => 'ADMIN']
                    ];

                    foreach($mock_staff as $staff): ?>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 20px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 36px; height: 36px; background: #01172a; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 900; color: #fff;">
                                    <?php 
                                    $initials = explode(' ', $staff['name']);
                                    echo substr($initials[0], 0, 1) . substr($initials[1] ?? '', 0, 1);
                                    ?>
                                </div>
                                <span style="font-size: 13px; font-weight: 850; color: #01172a;"><?php echo $staff['name']; ?></span>
                            </div>
                        </td>
                        <td style="padding: 20px;">
                            <span style="font-size: 11px; font-weight: 850; color: #475569; text-transform: uppercase;"><?php echo $staff['role']; ?></span>
                        </td>
                        <td style="padding: 20px;">
                            <span style="font-size: 11px; font-weight: 700; color: #64748b;"><?php echo $staff['rights']; ?></span>
                        </td>
                        <td style="padding: 20px; text-align: center;">
                            <span class="status-badge <?php echo $staff['badge']; ?>"><?php echo $staff['level']; ?></span>
                        </td>
                        <td style="padding: 20px; text-align: right;">
                            <a href="assign.php" class="btn" style="text-decoration: none; font-size: 11px; font-weight: 800; color: #fff; background: #2563eb; padding: 10px 20px; border-radius: 6px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.15);">EDIT RIGHTS</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
