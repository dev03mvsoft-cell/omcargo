<!-- GLOBAL MODULAR SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <span class="material-symbols-rounded" style="color: var(--primary); font-size: 30px;">local_shipping</span>
        <span>Oman Cargo</span>
    </div>
    <nav style="flex: 1;">
        <p style="font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 16px; padding-left: 12px; letter-spacing: 0.1em;">Operational Hub</p>
        
        <a href="<?php echo (isset($is_root) && $is_root) ? 'index.php' : ('../index.php'); ?>" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' && isset($is_root) && $is_root) ? 'active' : ''; ?>">
            <span class="material-symbols-rounded">grid_view</span>
            <span>Operations Overview</span>
        </a>

        <a href="<?php echo $path_prefix; ?>job-create.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'job-create.php') ? 'active' : ''; ?>">
            <span class="material-symbols-rounded">add_circle</span>
            <span>Create New Shipment</span>
        </a>

        <a href="<?php echo $path_prefix; ?>work-assignment.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'work-assignment.php') ? 'active' : ''; ?>">
            <span class="material-symbols-rounded">sync_alt</span>
            <span>Workflow Tracking</span>
        </a>

        <a href="<?php echo $path_prefix; ?>job-assign-slip.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'job-assign-slip.php') ? 'active' : ''; ?>">
            <span class="material-symbols-rounded">assignment</span>
            <span>Operation Cards</span>
        </a>

        <p style="font-size: 10px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 16px; padding-left: 12px; letter-spacing: 0.1em; margin-top: 30px;">Factory Loading</p>

        <a href="<?php echo $path_prefix; ?>factory-stuffing/job-create.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'job-create.php' && strpos($_SERVER['PHP_SELF'], 'factory-stuffing') !== false) ? 'active' : ''; ?>">
            <span class="material-symbols-rounded">factory</span>
            <span>New Factory Job</span>
        </a>

        <a href="<?php echo $path_prefix; ?>factory-stuffing/status.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'status.php' && strpos($_SERVER['PHP_SELF'], 'factory-stuffing') !== false) ? 'active' : ''; ?>">
            <span class="material-symbols-rounded">monitoring</span>
            <span>Stuffing Dashboard</span>
        </a>
    </nav>
</aside>
