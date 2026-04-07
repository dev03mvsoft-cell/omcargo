<?php
$path_prefix = "../";
$is_root = false;
include '../includes/header.php';
?>
<?php include '../includes/sidebar.php'; ?>

<style>
    :root {
        --p-x: 40px;
    }

    @media (max-width: 768px) {
        :root {
            --p-x: 20px;
        }
    }

    .main-area {
        background: #f8fafc;
        min-height: 100vh;
    }

    .command-hub {
        display: grid;
        grid-template-columns: 1fr auto auto;
        gap: 15px;
        margin-bottom: 40px;
        background: #fff;
        padding: 20px;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        align-items: center;
    }

    .search-input {
        position: relative;
        flex: 1;
    }

    .search-input i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 14px;
    }

    .search-input input {
        width: 100%;
        padding: 12px 16px 12px 48px;
        border: 1.5px solid #f1f5f9;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        background: #f8fafc;
        transition: all 0.2s;
    }

    .search-input input:focus {
        background: #fff;
        border-color: #000;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.03);
        outline: none;
    }

    .client-matrix {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
        gap: 25px;
    }

    .client-card {
        background: #fff;
        border: 1.5px solid #f1f5f9;
        border-radius: 20px;
        padding: 30px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .client-card:hover {
        transform: translateY(-5px);
        border-color: #e2e8f0;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
    }

    .avatar-mark {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
    }

    .meta-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .meta-row i {
        width: 16px;
        font-size: 13px;
        color: #94a3b8;
    }

    .meta-row span {
        font-size: 12px;
        font-weight: 600;
        color: #475569;
    }

    .bulk-action-bar {
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary);
        color: #fff;
        padding: 12px 30px;
        border-radius: 40px;
        display: none;
        align-items: center;
        gap: 20px;
        z-index: 2000;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
    }

    /* Avatar Colors */
    .bg-blue {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .bg-emerald {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .bg-amber {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .bg-rose {
        background: linear-gradient(135deg, #f43f5e, #e11d48);
    }

    .bg-violet {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    }
</style>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px var(--p-x); position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title" style="font-size: 20px; font-weight: 950; margin: 0; letter-spacing: -0.7px; color: #01172a;">Stakeholder Matrix</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Managing corporate partnerships and logistics delegation hubs</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div class="hide-mobile" style="text-align: right; border-right: 1px solid #f1f5f9; padding-right: 20px;">
                <p style="font-size: 9px; font-weight: 950; color: #94a3b8; text-transform: uppercase; margin: 0;">GLOBAL DIRECTORY</p>
                <p style="font-size: 10px; color: #10b981; font-weight: 950; margin: 0;">128 ACTIVE PARTNERS</p>
            </div>
            <a href="create.php" class="btn" style="background: var(--primary); color: #fff; font-size: 12px; font-weight: 800; padding: 12px 30px; border-radius: 12px; text-decoration: none; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.15);">
                <i class="fa-solid fa-plus-circle" style="font-size: 14px;"></i> ONBOARD PARTNER
            </a>
        </div>
    </header>

    <div class="content-padding" style="padding: 40px var(--p-x);">

        <!-- INTEGRATED COMMAND HUB -->
        <div class="command-hub">
            <div style="padding-left: 5px;">
                <input type="checkbox" id="select-all" style="width: 20px; height: 20px; cursor: pointer; accent-color: #000; border: 2px solid #e2e8f0; border-radius: 4px;">
            </div>
            <div class="search-input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="client-search" placeholder="Search by Client Name, Designation or GST/VAT ID...">
            </div>
            <div style="display: flex; gap: 10px;">
                <button class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 850; padding: 12px 20px; border-radius: 10px; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-download"></i> EXPORT
                </button>
                <button class="btn" style="background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 850; padding: 12px 20px; border-radius: 10px; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-sliders"></i> FILTER
                </button>
            </div>
        </div>

        <div class="client-matrix">
            <!-- Client Card 1 -->
            <div class="client-card" data-client="Anatolia Tile & Stone">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
                    <div style="display: flex; gap: 18px; align-items: center;">
                        <input type="checkbox" class="client-checkbox" style="width: 18px; height: 18px; cursor: pointer; accent-color: #000;">
                        <div class="avatar-mark bg-blue">A</div>
                        <div>
                            <h4 style="font-size: 16px; font-weight: 950; margin: 0; color: #01172a; letter-spacing: -0.3px;">ANATOLIA TILE & STONE</h4>
                            <p style="font-size: 9px; color: #3b82f6; font-weight: 950; margin-top: 4px; text-transform: uppercase; letter-spacing: 0.5px;">CANADIAN EXPORT HUB</p>
                        </div>
                    </div>
                    <span class="badge badge-success">VERIFIED</span>
                </div>

                <div style="margin-bottom: 30px; flex: 1;">
                    <div class="meta-row">
                        <i class="fa-solid fa-envelope"></i>
                        <span>logistics@anatolia.ca</span>
                    </div>
                    <div class="meta-row">
                        <i class="fa-solid fa-phone"></i>
                        <span>+1 905 555 0123 / +1 905 882 1102</span>
                    </div>
                    <div class="meta-row">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span style="font-weight: 800; color: #0f172a;">GST: 24AAACA1234A1Z5</span>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr auto; gap: 12px; padding-top: 25px; border-top: 1.5px dashed #f1f5f9;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 12px; border-radius: 10px; background: #f8fafc; color: #64748b; font-size: 11px; font-weight: 950; border: 1.5px solid #e2e8f0; transition: all 0.2s;" onmouseover="this.style.background='#fff'; this.style.borderColor='#000'; this.style.color='#000'" onmouseout="this.style.background='#f8fafc'; this.style.borderColor='#e2e8f0'; this.style.color='#64748b'">UNIT VIEW</a>
                    <a href="edit.php" style="text-align: center; text-decoration: none; padding: 12px; border-radius: 10px; background: var(--primary); color: #fff; font-size: 11px; font-weight: 850; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1);">MODIFY DATA</a>
                    <button class="btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 12px; transition: all 0.2s;" onmouseover="this.style.background='#ef4444'; this.style.color='#fff'" onmouseout="this.style.background='#fef2f2'; this.style.color='#ef4444'"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>

            <!-- Client Card 2 -->
            <div class="client-card" data-client="Raysut Cement Co">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
                    <div style="display: flex; gap: 18px; align-items: center;">
                        <input type="checkbox" class="client-checkbox" style="width: 18px; height: 18px; cursor: pointer; accent-color: #000;">
                        <div class="avatar-mark bg-emerald">R</div>
                        <div>
                            <h4 style="font-size: 16px; font-weight: 950; margin: 0; color: #01172a; letter-spacing: -0.3px;">RAYSUT CEMENT CO</h4>
                            <p style="font-size: 9px; color: #10b981; font-weight: 950; margin-top: 4px; text-transform: uppercase; letter-spacing: 0.5px;">OMAN INDUSTRIAL HUB</p>
                        </div>
                    </div>
                    <span class="badge badge-warning">AUDIT PENDING</span>
                </div>

                <div style="margin-bottom: 30px; flex: 1;">
                    <div class="meta-row">
                        <i class="fa-solid fa-envelope"></i>
                        <span>ops@raysut.om</span>
                    </div>
                    <div class="meta-row">
                        <i class="fa-solid fa-phone"></i>
                        <span>+968 2321 0000 / +968 2321 4402</span>
                    </div>
                    <div class="meta-row">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span style="font-weight: 800; color: #0f172a;">GST: OMAN-V-9928374-X</span>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr auto; gap: 12px; padding-top: 25px; border-top: 1.5px dashed #f1f5f9;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 12px; border-radius: 10px; background: #f8fafc; color: #64748b; font-size: 11px; font-weight: 950; border: 1.5px solid #e2e8f0; transition: all 0.2s;" onmouseover="this.style.background='#fff'; this.style.borderColor='#000'; this.style.color='#000'" onmouseout="this.style.background='#f8fafc'; this.style.borderColor='#e2e8f0'; this.style.color='#64748b'">UNIT VIEW</a>
                    <a href="edit.php" style="text-align: center; text-decoration: none; padding: 12px; border-radius: 10px; background: var(--primary); color: #fff; font-size: 11px; font-weight: 850; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1);">MODIFY DATA</a>
                    <button class="btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 12px; transition: all 0.2s;" onmouseover="this.style.background='#ef4444'; this.style.color='#fff'" onmouseout="this.style.background='#fef2f2'; this.style.color='#ef4444'"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>

            <!-- Client Card 3 -->
            <div class="client-card" data-client="Oman Trading Co">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
                    <div style="display: flex; gap: 18px; align-items: center;">
                        <input type="checkbox" class="client-checkbox" style="width: 18px; height: 18px; cursor: pointer; accent-color: #000;">
                        <div class="avatar-mark bg-rose">O</div>
                        <div>
                            <h4 style="font-size: 16px; font-weight: 950; margin: 0; color: #01172a; letter-spacing: -0.3px;">OMAN TRADING CO</h4>
                            <p style="font-size: 9px; color: #f43f5e; font-weight: 950; margin-top: 4px; text-transform: uppercase; letter-spacing: 0.5px;">DOMESTIC LOGISTICS HUB</p>
                        </div>
                    </div>
                    <span class="badge" style="background: #eff6ff; color: #2563eb; border-color: #dbeafe;">ENTERPRISE</span>
                </div>

                <div style="margin-bottom: 30px; flex: 1;">
                    <div class="meta-row">
                        <i class="fa-solid fa-envelope"></i>
                        <span>info@omantrading.com</span>
                    </div>
                    <div class="meta-row">
                        <i class="fa-solid fa-phone"></i>
                        <span>+968 2444 8888 / +968 2444 9901</span>
                    </div>
                    <div class="meta-row">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span style="font-weight: 800; color: #0f172a;">GST: OM-TRAD-1100223</span>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr auto; gap: 12px; padding-top: 25px; border-top: 1.5px dashed #f1f5f9;">
                    <a href="view.php" style="text-align: center; text-decoration: none; padding: 12px; border-radius: 10px; background: #f8fafc; color: #64748b; font-size: 11px; font-weight: 950; border: 1.5px solid #e2e8f0; transition: all 0.2s;" onmouseover="this.style.background='#fff'; this.style.borderColor='#000'; this.style.color='#000'" onmouseout="this.style.background='#f8fafc'; this.style.borderColor='#e2e8f0'; this.style.color='#64748b'">UNIT VIEW</a>
                    <a href="edit.php" style="text-align: center; text-decoration: none; padding: 12px; border-radius: 10px; background: var(--primary); color: #fff; font-size: 11px; font-weight: 850; box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1);">MODIFY DATA</a>
                    <button class="btn" style="background: #fef2f2; border: 1.5px solid #fee2e2; color: #ef4444; border-radius: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 12px; transition: all 0.2s;" onmouseover="this.style.background='#ef4444'; this.style.color='#fff'" onmouseout="this.style.background='#fef2f2'; this.style.color='#ef4444'"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- BULK ACTION COMMAND BAR -->
    <div class="bulk-action-bar" id="bulk-bar">
        <span style="font-size: 12px; font-weight: 950; border-right: 1.5px solid rgba(255,255,255,0.2); padding-right: 20px;" id="bulk-count">3 RECORDS SELECTED</span>
        <div style="display: flex; gap: 15px;">
            <button class="btn" style="background: transparent; color: #fff; font-size: 10px; font-weight: 950; padding: 5px; cursor: pointer;"><i class="fa-solid fa-shield-check"></i> VERIFY ALL</button>
            <button class="btn" style="background: transparent; color: #fff; font-size: 10px; font-weight: 950; padding: 5px; cursor: pointer;"><i class="fa-solid fa-download"></i> EXPORT BATCH</button>
            <button class="btn" id="bulk-delete" style="background: #ef4444; color: #fff; font-size: 10px; font-weight: 950; padding: 8px 15px; border-radius: 20px; cursor: pointer; border: none;"><i class="fa-solid fa-trash-can"></i> PURGE SELECTION</button>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.getElementById('select-all');
        const clientCheckboxes = document.querySelectorAll('.client-checkbox');
        const bulkBar = document.getElementById('bulk-bar');
        const bulkCount = document.getElementById('bulk-count');
        const searchInput = id = 'client-search';

        function updateBulkBar() {
            const checked = document.querySelectorAll('.client-checkbox:checked').length;
            if (checked > 0) {
                bulkBar.style.display = 'flex';
                bulkCount.innerText = `${checked} ${checked === 1 ? 'RECORD' : 'RECORDS'} SELECTED`;
            } else {
                bulkBar.style.display = 'none';
            }
        }

        if (selectAll) {
            selectAll.addEventListener('change', function() {
                clientCheckboxes.forEach(cb => {
                    cb.checked = this.checked;
                });
                updateBulkBar();
            });
        }

        clientCheckboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkBar);
        });

        // Simple Search Logic
        const searchElement = document.getElementById('client-search');
        if (searchElement) {
            searchElement.addEventListener('input', function(e) {
                const term = e.target.value.toLowerCase();
                const cards = document.querySelectorAll('.client-card');
                cards.forEach(card => {
                    const clientName = card.dataset.client.toLowerCase();
                    if (clientName.includes(term)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }

        // Single Delete Action
        document.querySelectorAll('.client-card .btn[style*="color: #ef4444"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const card = this.closest('.client-card');
                const clientName = card.querySelector('h4').innerText;

                Swal.fire({
                    title: 'Confirm Deletion',
                    text: `You are about to permanently remove ${clientName} from the Oman Cargo registry.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#000',
                    cancelButtonColor: '#f1f5f9',
                    cancelButtonText: '<span style="color: #64748b; font-weight: 800;">CANCEL</span>',
                    confirmButtonText: 'PURGE RECORD'
                }).then((result) => {
                    if (result.isConfirmed) {
                        card.style.transform = 'scale(0.9)';
                        card.style.opacity = '0';
                        setTimeout(() => card.remove(), 300);
                    }
                });
            });
        });

        // Bulk Delete Action
        const bulkDeleteBtn = document.getElementById('bulk-delete');
        if (bulkDeleteBtn) {
            bulkDeleteBtn.addEventListener('click', function() {
                const selected = document.querySelectorAll('.client-checkbox:checked');

                Swal.fire({
                    title: 'Bulk Purge Triggered',
                    text: `Are you sure you want to permanently delete these ${selected.length} client records? This action is irreversible.`,
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'CONFIRM BULK PURGE'
                }).then((result) => {
                    if (result.isConfirmed) {
                        selected.forEach(cb => {
                            const card = cb.closest('.client-card');
                            card.style.transform = 'scale(0.9)';
                            card.style.opacity = '0';
                            setTimeout(() => card.remove(), 300);
                        });
                        selectAll.checked = false;
                        updateBulkBar();
                    }
                });
            });
        }
    });
</script>

<?php include '../includes/footer.php'; ?>