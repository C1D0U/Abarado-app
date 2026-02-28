<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products & Tasks</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink:       #1a1a2e;
            --ink-muted: #6b6b8a;
            --surface:   #f7f7fb;
            --card:      #ffffff;
            --border:    #e4e4f0;
            --accent:    #4f46e5;
            --accent-lt: #eef2ff;
            --green:     #059669;
            --green-lt:  #ecfdf5;
            --radius:    12px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--surface);
            color: var(--ink);
            min-height: 100vh;
            padding: 40px 20px 80px;
        }

        /* ── Layout ── */
        .page {
            max-width: 860px;
            margin: 0 auto;
            display: grid;
            gap: 40px;
        }

        /* ── Page header ── */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding-bottom: 24px;
            border-bottom: 2px solid var(--ink);
            animation: fadeUp .5s ease both;
        }

        .page-header h1 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2rem, 5vw, 3rem);
            line-height: 1;
            letter-spacing: -1px;
        }

        .page-header h1 span { color: var(--accent); }

        .date-badge {
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--ink-muted);
            padding-bottom: 4px;
        }

        /* ── Card ── */
        .card {
            background: var(--card);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,.04), 0 8px 24px rgba(0,0,0,.04);
            animation: fadeUp .5s ease both;
        }

        .card:nth-child(2) { animation-delay: .08s; }
        .card:nth-child(3) { animation-delay: .16s; }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title .icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: grid; place-items: center;
            font-size: .9rem;
        }

        .icon-products { background: var(--accent-lt); }
        .icon-tasks    { background: var(--green-lt); }

        .count-pill {
            font-family: 'DM Sans', sans-serif;
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .count-pill.blue  { background: var(--accent-lt); color: var(--accent); }
        .count-pill.green { background: var(--green-lt);  color: var(--green); }

        /* ── Search bar ── */
        .card-toolbar {
            padding: 14px 24px;
            border-bottom: 1px solid var(--border);
            background: var(--surface);
        }

        .search-wrap {
            position: relative;
            max-width: 320px;
        }

        .search-wrap svg {
            position: absolute;
            left: 12px; top: 50%;
            transform: translateY(-50%);
            color: var(--ink-muted);
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 8px 12px 8px 36px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: .85rem;
            background: var(--card);
            color: var(--ink);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .search-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(79,70,229,.1);
        }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; }

        thead tr { background: transparent; }
        th {
            padding: 12px 24px;
            text-align: left;
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--ink-muted);
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            user-select: none;
            white-space: nowrap;
        }

        th:hover { color: var(--ink); }
        th .sort-icon { margin-left: 4px; opacity: .4; font-size: .65rem; }

        tbody tr {
            transition: background .15s;
            border-bottom: 1px solid var(--border);
        }

        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--surface); }

        td {
            padding: 14px 24px;
            font-size: .875rem;
            vertical-align: middle;
        }

        .td-id {
            font-family: 'DM Mono', monospace;
            font-size: .75rem;
            color: var(--ink-muted);
            font-weight: 500;
        }

        .td-name { font-weight: 500; }

        .category-tag {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .04em;
            background: var(--accent-lt);
            color: var(--accent);
        }

        .no-data {
            text-align: center;
            color: var(--ink-muted);
            padding: 40px 24px;
            font-size: .9rem;
        }

        .no-data .empty-icon { font-size: 2rem; display: block; margin-bottom: 8px; }

        /* ── Task list ── */
        .task-list { padding: 8px 0; }

        .task-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 24px;
            border-bottom: 1px solid var(--border);
            transition: background .15s;
            cursor: pointer;
        }

        .task-item:last-child { border-bottom: none; }
        .task-item:hover { background: var(--surface); }
        .task-item.done .task-text { text-decoration: line-through; color: var(--ink-muted); }

        .task-check {
            flex-shrink: 0;
            width: 20px; height: 20px;
            border-radius: 6px;
            border: 2px solid var(--border);
            display: grid; place-items: center;
            font-size: .65rem;
            transition: background .2s, border-color .2s;
            color: transparent;
        }

        .task-item.done .task-check {
            background: var(--green);
            border-color: var(--green);
            color: #fff;
        }

        .task-text { font-size: .875rem; }

        /* ── Animations ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Responsive ── */
        @media (max-width: 560px) {
            td:first-child, th:first-child { display: none; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 8px; }
        }
    </style>
</head>
<body>
<div class="page">

    <!-- Page Header -->
    <div class="page-header">
        <h1>Products <span>&</span> Tasks</h1>
        <span class="date-badge" id="js-date"></span>
    </div>

    <!-- Products Card -->
    <div class="card" id="products-card">
        <div class="card-header">
            <div class="card-title">
                <span class="icon icon-products">📦</span>
                Products
            </div>
            <span class="count-pill blue" id="product-count">
                {{ count($products) }} items
            </span>
        </div>
        <div class="card-toolbar">
            <div class="search-wrap">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <input class="search-input" type="search" placeholder="Search products…" id="product-search" oninput="filterTable('product-tbody', this.value)">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th onclick="sortTable('product-tbody', 0)">ID <span class="sort-icon">⇅</span></th>
                    <th onclick="sortTable('product-tbody', 1)">Name <span class="sort-icon">⇅</span></th>
                    <th onclick="sortTable('product-tbody', 2)">Category <span class="sort-icon">⇅</span></th>
                </tr>
            </thead>
            <tbody id="product-tbody">
                @forelse($products as $product)
                    <tr>
                        <td class="td-id">#{{ $product['id'] }}</td>
                        <td class="td-name">{{ $product['name'] }}</td>
                        <td><span class="category-tag">{{ $product['category'] }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="no-data">
                            <span class="empty-icon">📭</span>
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tasks Card -->
    <div class="card" id="tasks-card">
        <div class="card-header">
            <div class="card-title">
                <span class="icon icon-tasks">✅</span>
                Tasks
            </div>
            <span class="count-pill green" id="task-count">
                {{ count($tasks) }} tasks
            </span>
        </div>
        <div class="task-list" id="task-list">
            @forelse($tasks as $task)
                <div class="task-item" onclick="toggleTask(this)">
                    <div class="task-check">✓</div>
                    <span class="task-text">{{ $task }}</span>
                </div>
            @empty
                <div class="no-data">
                    <span class="empty-icon">🗒️</span>
                    No tasks found.
                </div>
            @endforelse
        </div>
    </div>

</div>

<script>
    // Live date
    const d = new Date();
    document.getElementById('js-date').textContent =
        d.toLocaleDateString('en-US', { weekday: 'short', month: 'long', day: 'numeric', year: 'numeric' });

    // Toggle task done state
    function toggleTask(el) {
        el.classList.toggle('done');
    }

    // Filter table rows by search query
    function filterTable(tbodyId, query) {
        const q = query.toLowerCase();
        document.querySelectorAll(`#${tbodyId} tr`).forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    }

    // Sort table by column index
    function sortTable(tbodyId, colIdx) {
        const tbody = document.getElementById(tbodyId);
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const asc = tbody.dataset.sortCol == colIdx && tbody.dataset.sortDir === 'asc';
        rows.sort((a, b) => {
            const at = a.cells[colIdx]?.textContent.trim() ?? '';
            const bt = b.cells[colIdx]?.textContent.trim() ?? '';
            return asc ? bt.localeCompare(at, undefined, {numeric:true})
                       : at.localeCompare(bt, undefined, {numeric:true});
        });
        tbody.dataset.sortCol = colIdx;
        tbody.dataset.sortDir = asc ? 'desc' : 'asc';
        rows.forEach(r => tbody.appendChild(r));
    }
</script>
</body>
</html>