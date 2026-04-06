<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root { --p-x: 30px; }
    @media (max-width: 768px) { :root { --p-x: 15px; } }
    body { overflow-x: hidden; width: 100%; }
    .main-area { width: 100%; overflow-x: hidden; position: relative; }
    
    .filter-input-group { transition: all 0.2s; border: 1.5px solid #e2e8f0; border-radius: 8px; background: #fff; position: relative; }
    .filter-input-group:focus-within { border-color: #000; }
    .filter-input-group input { width: 100%; border: none; outline: none; background: transparent; padding: 12px 12px 12px 48px; font-size: 13px; font-weight: 600; }
    .filter-input-group i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 14px; pointer-events: none; }
</style>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px var(--p-x); position: sticky; top: 0; z-index: 1000;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">Client Directory</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Manage global logistics stakeholders and corporate partners</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div class="hide-mobile" style="text-align: right; border-right: 1px solid #f1f5f9; padding-right: 20px;">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">Total Records</p>
                <p style="font-size: 10px; color: #3b82f6; font-weight: 800; margin: 0;">128 ACTIVE CLIENTS</p>
            </div>
            <a href="create.php" class="btn" style="background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; padding: 12px 25px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                <i class="fa-solid fa-plus"></i> ADD NEW CLIENT
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 30px var(--p-x);">
        <!-- Search & Filter Hub (With Bulk Actions) -->
        <div class="search-filter-hub" style="display: grid; grid-template-columns: 50px 1fr 280px 150px; gap: 15px; margin-bottom: 40px; background: #f8fafc; padding: 15px; border-radius: 12px; border: 1.5px solid #f1f5f9; align-items: center;">
            <div style="display: flex; justify-content: center;">
                <input type="checkbox" id="select-all" style="width: 18px; height: 18px; cursor: pointer; accent-color: #000;">
            </div>
            <div class="filter-input-group">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search and select for bulk action...">
            </div>
            <div class="filter-input-group">
                <i class="fa-solid fa-filter"></i>
                <select style="width: 100%; border: none; outline: none; background: transparent; padding: 12px 12px 12px 48px; font-size: 13px; font-weight: 800; appearance: none; cursor: pointer;">
                    <option>Bulk Action: Select...</option>
                    <option>Delete Selected</option>
                    <option>Export Selected</option>
                    <option>Verify Selected</option>
                </select>
                <i class="fa-solid fa-chevron-down" style="left: auto; right: 16px; font-size: 10px; color: #94a3b8;"></i>
            </div>
            <button class="btn" style="background: #ef4444; color: #fff; border: none; font-size: 12px; font-weight: 850; padding: 12px; border-radius: 8px; display: none; align-items: center; justify-content: center; gap: 8px; cursor: pointer;">
                <i class="fa-solid fa-trash-can"></i> DELETE SELECTED
            </button>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(min(100%, 340px), 1fr)); gap: 20px;">
            <!-- Client Card 1 -->
            <div class="card" style="padding: 24px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: #fff; position: relative;">
                <div style="display: flex; justify-content: flex-start; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="padding-top: 2px;">
                        <input type="checkbox" class="client-checkbox" style="width: 16px; height: 16px; cursor: pointer; accent-color: #000; margin: 0;">
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div>
                                <h4 style="font-size: 15px; font-weight: 900; margin: 0; color: #01172a;">ANATOLIA TILE & STONE</h4>
                                <p style="font-size: 10px; color: #94a3b8; font-weight: 800; margin-top: 4px; text-transform: uppercase;">TRANS-CAN-LTD</p>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #f0fdf4; color: #16a34a; padding: 3px 8px; border-radius: 4px; border: 1px solid #dcfce7;">VERIFIED</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 20px; padding-left: 31px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-envelope" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569;">ops@anatolia.ca</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-phone" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 800; color: #475569;">+1 (905) 555-0123 / +1 (905) 555-0124</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-file-invoice" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 10px; font-weight: 950; color: #1e293b;">GST: 24AAACA1234A1Z5</span>
                    </div>
                </div>

                <div style="padding-top: 15px; border-top: 1px dashed #e2e8f0; display: grid; grid-template-columns: 1fr 1fr 50px; gap: 10px;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #f8fafc; color: #64748b; font-size: 11px; font-weight: 850; border: 1.5px solid #e2e8f0;">PROFILE</a>
                    <a href="edit.php" class="btn" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #2563eb; color: #fff; font-size: 11px; font-weight: 700; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.15);">EDIT DETAILS</a>
                    <button class="btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 10px;"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>

            <!-- Client Card 2 -->
            <div class="card" style="padding: 24px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: #fff; position: relative;">
                <div style="display: flex; justify-content: flex-start; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="padding-top: 2px;">
                        <input type="checkbox" class="client-checkbox" style="width: 16px; height: 16px; cursor: pointer; accent-color: #000; margin: 0;">
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div>
                                <h4 style="font-size: 15px; font-weight: 900; margin: 0; color: #01172a;">RAYSUT CEMENT CO</h4>
                                <p style="font-size: 10px; color: #94a3b8; font-weight: 800; margin-top: 4px; text-transform: uppercase;">SALALAH-LOGIX</p>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #fef2f2; color: #ef4444; padding: 3px 8px; border-radius: 4px; border: 1px solid #fee2e2;">AUDIT PENDING</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 20px; padding-left: 31px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-envelope" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569;">shipping@raysut.om</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-phone" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 800; color: #475569;">+968 2321 0000 / +968 2321 0001</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-file-invoice" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 10px; font-weight: 950; color: #1e293b;">GST: OMAN-V-9928374-X</span>
                    </div>
                </div>

                <div style="padding-top: 15px; border-top: 1px dashed #e2e8f0; display: grid; grid-template-columns: 1fr 1fr 50px; gap: 10px;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #f8fafc; color: #64748b; font-size: 11px; font-weight: 850; border: 1.5px solid #e2e8f0;">PROFILE</a>
                    <a href="edit.php" class="btn" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #2563eb; color: #fff; font-size: 11px; font-weight: 700; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.15);">EDIT DETAILS</a>
                    <button class="btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 10px;"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
            
            <!-- Client Card 3 -->
            <div class="card" style="padding: 24px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: #fff; position: relative;">
                <div style="display: flex; justify-content: flex-start; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="padding-top: 2px;">
                        <input type="checkbox" class="client-checkbox" style="width: 16px; height: 16px; cursor: pointer; accent-color: #000; margin: 0;">
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div>
                                <h4 style="font-size: 15px; font-weight: 900; margin: 0; color: #01172a;">OMAN TRADING CO</h4>
                                <p style="font-size: 10px; color: #94a3b8; font-weight: 800; margin-top: 4px; text-transform: uppercase;">MUSCAT-IMPORT-HUB</p>
                            </div>
                            <span style="font-size: 8px; font-weight: 950; background: #eff6ff; color: #2563eb; padding: 3px 8px; border-radius: 4px; border: 1px solid #dbeafe;">ENTERPRISE</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 20px; padding-left: 31px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-envelope" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 700; color: #475569;">info@omantrading.com</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <i class="fa-solid fa-phone" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 11px; font-weight: 800; color: #475569;">+968 2444 8888 / +968 2444 9999</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-file-invoice" style="font-size: 12px; color: #94a3b8; width: 14px;"></i>
                        <span style="font-size: 10px; font-weight: 950; color: #1e293b;">GST: OM-TRAD-1100223</span>
                    </div>
                </div>

                <div style="padding-top: 15px; border-top: 1px dashed #e2e8f0; display: grid; grid-template-columns: 1fr 1fr 50px; gap: 10px;">
                    <a href="client-view.php" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #f8fafc; color: #64748b; font-size: 10px; font-weight: 850; border: 1.5px solid #e2e8f0;">PROFILE</a>
                    <a href="client-edit.php" style="text-align: center; text-decoration: none; padding: 10px; border-radius: 6px; background: #000; color: #fff; font-size: 10px; font-weight: 850;">EDIT DETAILS</a>
                    <button class="btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer;"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    const clientCheckboxes = document.querySelectorAll('.client-checkbox');
    const bulkDeleteBtn = document.querySelector('.search-filter-hub .btn[style*="background: #ef4444"]');

    // Select All Logic
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            clientCheckboxes.forEach(cb => {
                cb.checked = this.checked;
            });
            updateDeleteCount();
        });
    }

    // Individual Selection Logic
    clientCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateDeleteCount);
    });

    function updateDeleteCount() {
        const count = document.querySelectorAll('.client-checkbox:checked').length;
        if (count > 0) {
            bulkDeleteBtn.style.display = 'flex';
            bulkDeleteBtn.innerHTML = `<i class="fa-solid fa-trash-can"></i> DELETE SELECTED (${count})`;
        } else {
            bulkDeleteBtn.style.display = 'none';
        }
    }

    // Single Delete Action
    document.querySelectorAll('.card .btn[style*="color: #ef4444"]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const clientName = this.closest('.card').querySelector('h4').innerText;
            if (confirm(`CRITICAL: Are you sure you want to permanently delete "${clientName}"? This action cannot be undone.`)) {
                this.closest('.card').style.opacity = '0.5';
                this.closest('.card').style.pointerEvents = 'none';
                alert('Record marked for deletion.');
                // Here you would normally trigger an AJAX call to delete-client.php
            }
        });
    });

    // Bulk Delete Action
    if (bulkDeleteBtn) {
        bulkDeleteBtn.addEventListener('click', function() {
            const selected = document.querySelectorAll('.client-checkbox:checked');
            if (selected.length === 0) {
                alert('Please select at least one client to perform bulk deletion.');
                return;
            }

            if (confirm(`SECURITY ALERT: You are about to permanently delete ${selected.length} client records. Proceed with bulk wipe?`)) {
                selected.forEach(cb => {
                    cb.closest('.card').style.display = 'none';
                });
                alert('Success: ' + selected.length + ' records deleted from the registry.');
                if (selectAll) selectAll.checked = false;
                updateDeleteCount();
            }
        });
    }
});
</script>

<?php include '../includes/footer.php'; ?>
