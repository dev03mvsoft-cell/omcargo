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
    .filter-input-group { transition: all 0.2s; border: 1.5px solid #e2e8f0; border-radius: 8px; background: #fff; position: relative; }
    .filter-input-group:focus-within { border-color: #000; }
    .filter-input-group i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 14px; }
    .client-checkbox { width: 16px; height: 16px; cursor: pointer; accent-color: #000; margin: 0; }
</style>

<main class="main-area">
    <!-- Header Strategy -->
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 18px; font-weight: 900; color: #01172a; margin: 0; letter-spacing: -0.5px;">Staff Management</h2>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 700; margin-top: 2px; text-transform: uppercase; letter-spacing: 0.5px;">Personnel Registry & Operations Team</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div style="text-align: right; padding-right: 15px; border-right: 1px solid #e2e8f0;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Total Workforce</p>
                <p style="font-size: 10px; color: #6366f1; font-weight: 800; margin: 0;">24 PERSONNEL ACTIVE</p>
            </div>
            <a href="create.php" class="btn" style="background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; padding: 12px 25px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                <i class="fa-solid fa-user-plus"></i> ADD STAFF MEMBER
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <!-- Search & Filter Hub -->
        <div class="search-filter-hub" style="display: grid; grid-template-columns: 1fr 240px 180px; gap: 20px; margin-bottom: 30px;">
            <div class="filter-input-group">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Staff Name, Role, or ID..." style="width: 100%; border: none; outline: none; background: transparent; padding: 14px 14px 14px 48px; font-size: 13px; font-weight: 600;">
            </div>
            <div class="filter-input-group">
                <i class="fa-solid fa-id-badge"></i>
                <div style="width: 100%; padding: 12px 12px 12px 48px; display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" id="select-all" style="width: 15px; height: 15px; cursor: pointer; accent-color: #000;">
                    <label for="select-all" style="font-size: 12px; font-weight: 850; color: #01172a; cursor: pointer; margin: 0;">SELECT ALL</label>
                </div>
            </div>
            <button class="btn" id="bulk-delete-btn" style="background: #ef4444; color: #fff; border: none; font-size: 12px; font-weight: 850; padding: 12px; border-radius: 8px; display: none; align-items: center; justify-content: center; gap: 8px; cursor: pointer;">
                <i class="fa-solid fa-trash-can"></i> DELETE SELECTED
            </button>
        </div>

        <!-- Registry Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(min(100%, 350px), 1fr)); gap: 20px;">
            <!-- Staff Card 1 -->
            <div class="card" style="padding: 24px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: #fff; position: relative;">
                <div style="display: flex; justify-content: flex-start; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="padding-top: 2px;">
                        <input type="checkbox" class="client-checkbox" style="width: 16px; height: 16px; cursor: pointer; accent-color: #000;">
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 900; color: #475569; border: 1.5px solid #e2e8f0;">AR</div>
                                <div>
                                    <h4 style="font-size: 15px; font-weight: 900; margin: 0; color: #01172a;">Ahmed Raza</h4>
                                    <p style="font-size: 10px; color: #6366f1; font-weight: 850; margin-top: 4px; text-transform: uppercase;">Fleet Supervisor</p>
                                </div>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 3px 8px; border-radius: 4px; border: 1px solid #dcfce7;">ACTIVE</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 20px; padding-left: 31px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-phone" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569;">+968 9455 1200 / +968 7811 3455</span>
                    </div>
                    <div style="display: flex; align-items: start; gap: 10px;">
                        <i class="fa-solid fa-location-dot" style="font-size: 12px; color: #94a3b8; width: 14px; margin-top: 2px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569; line-height: 1.4;">Street No 44, Matrah, Muscat, Oman</span>
                    </div>
                </div>

                <div style="padding-top: 15px; border-top: 1px dashed #e2e8f0; display: grid; grid-template-columns: 1fr 1fr 50px; gap: 10px;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #f8fafc; color: #64748b; font-size: 12px; font-weight: 850; border: 1.5px solid #e2e8f0;">PROFILE</a>
                    <a href="edit.php" class="btn" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #2563eb; color: #fff; font-size: 11px; font-weight: 700; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.15);">EDIT CREDENTIALS</a>
                    <button class="btn delete-single-btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer;"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>

            <!-- Staff Card 2 -->
            <div class="card" style="padding: 24px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: #fff; position: relative;">
                <div style="display: flex; justify-content: flex-start; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="padding-top: 2px;">
                        <input type="checkbox" class="client-checkbox" style="width: 16px; height: 16px; cursor: pointer; accent-color: #000;">
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; background: #fef2f2; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 900; color: #ef4444; border: 1.5px solid #fee2e2;">SK</div>
                                <div>
                                    <h4 style="font-size: 15px; font-weight: 900; margin: 0; color: #01172a;">Salim Khan</h4>
                                    <p style="font-size: 10px; color: #6366f1; font-weight: 850; margin-top: 4px; text-transform: uppercase;">Container Inspector</p>
                                </div>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #fff7ed; color: #ea580c; padding: 3px 8px; border-radius: 4px; border: 1px solid #ffedd5;">ON LEAVE</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 20px; padding-left: 31px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-phone" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569;">+968 2321 0055 / +968 9544 2200</span>
                    </div>
                    <div style="display: flex; align-items: start; gap: 10px;">
                        <i class="fa-solid fa-location-dot" style="font-size: 12px; color: #94a3b8; width: 14px; margin-top: 2px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569; line-height: 1.4;">Sector 1, Salalah Port Housing, Oman</span>
                    </div>
                </div>

                <div style="padding-top: 15px; border-top: 1px dashed #e2e8f0; display: grid; grid-template-columns: 1fr 1fr 50px; gap: 10px;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #f8fafc; color: #64748b; font-size: 12px; font-weight: 850; border: 1.5px solid #e2e8f0;">PROFILE</a>
                    <a href="edit.php" class="btn" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #2563eb; color: #fff; font-size: 11px; font-weight: 700; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.15);">EDIT CREDENTIALS</a>
                    <button class="btn delete-single-btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer;"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.client-checkbox');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');

    function updateBulkAction() {
        const checkedCount = document.querySelectorAll('.client-checkbox:checked').length;
        if (checkedCount > 0) {
            bulkDeleteBtn.style.display = 'flex';
            bulkDeleteBtn.innerHTML = `<i class="fa-solid fa-trash-can"></i> DELETE SELECTED (${checkedCount})`;
        } else {
            bulkDeleteBtn.style.display = 'none';
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateBulkAction();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkAction);
    });

    // Single Delete
    document.querySelectorAll('.delete-single-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const name = this.closest('.card').querySelector('h4').innerText;
            if (confirm(`SECURITY PROTOCOL: Are you sure you want to remove "${name}" from the active personnel list?`)) {
                this.closest('.card').style.transition = 'all 0.4s';
                this.closest('.card').style.opacity = '0';
                this.closest('.card').style.transform = 'scale(0.95)';
                setTimeout(() => this.closest('.card').remove(), 400);
            }
        });
    });

    // Bulk Delete
    if (bulkDeleteBtn) {
        bulkDeleteBtn.addEventListener('click', function() {
            const checked = document.querySelectorAll('.client-checkbox:checked');
            if (confirm(`CRITICAL ACTION: Permanently remove ${checked.length} staff records from the directory?`)) {
                checked.forEach(cb => {
                    const card = cb.closest('.card');
                    card.style.transition = 'all 0.4s';
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => card.remove(), 400);
                });
                selectAll.checked = false;
                this.style.display = 'none';
            }
        });
    }
});
</script>

<?php include '../includes/footer.php'; ?>
