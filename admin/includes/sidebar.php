<!-- GLOBAL MODULAR SIDEBAR -->
<aside class="sidebar" style="background: #fff; border-right: 1px solid #f1f5f9;">
    <div class="sidebar-logo" style="border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: center; background: #fff; padding: 32px 24px;">
        <img src="<?php echo $path_prefix; ?>../assets/logo/oman-logo.webp" alt="Oman Cargo" style="width: 150px; height: auto; max-height: 120px; object-fit: contain;">
    </div>
    <nav class="sidebar-nav">
        <?php if (isset($is_client_portal) && $is_client_portal): ?>
            <!-- ==========================================
                 CLIENT PORTAL MENU (DYNAMIC)
            =========================================== -->
            <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin: 25px 0 15px 0; border-bottom: 1.5px solid #f8fafc; padding-bottom: 8px;">CLIENT CONSOLE</p>

            <a href="<?php echo $path_prefix; ?>../client-index.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'client-index.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; transition: all 0.2s; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-gauge-high" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Main Dashboard</span>
            </a>

            <a href="<?php echo $path_prefix; ?>../client-track.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'client-track.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-location-crosshairs" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Live Tracking</span>
            </a>

            <a href="<?php echo $path_prefix; ?>../client-history.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'client-history.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-clock-rotate-left" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Order History</span>
            </a>

            <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin: 30px 0 15px 0; border-bottom: 1.5px solid #f8fafc; padding-bottom: 8px;">ACCOUNT SETTINGS</p>

            <a href="<?php echo $path_prefix; ?>../client-profile.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'client-profile.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-id-card-clip" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">My Profile</span>
            </a>

            <a href="#" class="nav-item" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-circle-question" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Help Center</span>
            </a>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #e2e8f0;">
                <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin-bottom: 12px;">SYSTEM SWITCH</p>
                <a href="<?php echo $path_prefix; ?>../index.php" class="nav-item" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none; background: #f8fafc; border: 1.5px solid #e2e8f0; color: #64748b;">
                    <i class="fa-solid fa-shield-halved" style="font-size: 14px;"></i>
                    <span style="font-size: 13px; font-weight: 700;">Admin Dashboard</span>
                </a>
            </div>

            <a href="#" class="nav-item" style="margin-top: 10px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none; color: #ef4444;">
                <i class="fa-solid fa-right-from-bracket" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Logout Portal</span>
            </a>

        <?php else: ?>
            <!-- ==========================================
                 ADMINISTRATOR MENU (DEFAULT)
            =========================================== -->
            <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin: 25px 0 15px 0; border-bottom: 1.5px solid #f8fafc; padding-bottom: 8px;">MAIN OPERATIONS</p>

            <a href="<?php echo $path_prefix; ?>../index.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' && !isset($is_client_portal)) ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; transition: all 0.2s; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-house" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Dashboard Overview</span>
            </a>

            <a href="<?php echo $path_prefix; ?>job-create.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'job-create.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-square-plus" style="font-size: 14px; color: #3b82f6;"></i>
                <span style="font-size: 13px; font-weight: 700;">Create New Job</span>
            </a>

            <a href="<?php echo $path_prefix; ?>work-assignment.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'work-assignment.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-list-check" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Active Taskings</span>
            </a>

            <a href="<?php echo $path_prefix; ?>job-registry.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'job-registry.php') ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-magnifying-glass-location" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">All Operations</span>
            </a>

            <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin: 30px 0 15px 0; border-bottom: 1.5px solid #f8fafc; padding-bottom: 8px;">MASTER REGISTRY</p>

            <a href="<?php echo $path_prefix; ?>clients/index.php" class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], 'clients/') !== false) ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-address-book" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Client Management</span>
            </a>

            <a href="<?php echo $path_prefix; ?>transport/index.php" class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], 'transport/') !== false) ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-truck-moving" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Transport Fleet</span>
            </a>

            <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin: 30px 0 15px 0; border-bottom: 1.5px solid #f8fafc; padding-bottom: 8px;">SYSTEM CONTROL</p>

            <a href="<?php echo $path_prefix; ?>staff/index.php" class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], 'staff/') !== false) ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-user-tie" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Staff Management</span>
            </a>

            <a href="<?php echo $path_prefix; ?>permissions/index.php" class="nav-item <?php echo (strpos($_SERVER['PHP_SELF'], 'permissions/') !== false) ? 'active' : ''; ?>" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-shield-halved" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Role & Permissions</span>
            </a>

            <p style="font-size: 9px; font-weight: 850; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; padding: 0 16px; margin: 30px 0 15px 0; border-bottom: 1.5px solid #f8fafc; padding-bottom: 8px;">EXTERNAL VIEWS</p>

            <a href="<?php echo $path_prefix; ?>../client-index.php" class="nav-item" style="margin-bottom: 6px; padding: 12px 16px; border-radius: 8px; display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <i class="fa-solid fa-user-gear" style="font-size: 14px;"></i>
                <span style="font-size: 13px; font-weight: 700;">Switch to Client View</span>
            </a>
        <?php endif; ?>
    </nav>
</aside>