<style>
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-transform: uppercase;
    }

    body {
        background-color: #f9fafb;
        color: #111827;
        line-height: 1.5;
    }

    /* Container */
    .container {
    width: 100%;
    max-width: 100vw;
    padding: 0 10px;
}

    /* Header */
    .header {
        background-color: #059669;
        color: white;
        padding: 1rem 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: fixed;
        top:-0;
        width: 100%;
        z-index: 1;
    }

    .header-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logos {
        display: flex;
        gap: 0.5rem;
    }

    .logo {
        width: 64px;
        height: 64px;
        object-fit: contain;
    }

    .title {
        font-size: 1.75rem;
        font-weight: 700;
        font-family: serif;
    }

    .search-section {
        width: 100%;
        display: flex;
        margin-bottom: 10px;
    }

    .auth{
        display: flex;
        padding: 5px;
        padding-left: 50px;
        gap: 10px;
    }


    .links{
        display: flex;

        margin-right: 100px;
        gap: 40px;
    }

    .links a{
        color: white;
        text-decoration: none;
        font-size: 18px;
    }



    .search-container {
        position: relative;
        max-width: 320px;
    }

    .search-input {
        width: 100%;
        padding: 0.5rem 0.75rem 0.5rem 2.25rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        outline: none;
        font-size: 0.875rem;
        background-color: white;
    }

    .search-input:focus {
        border-color: #047857;
        box-shadow: 0 0 0 2px rgba(4, 120, 87, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        width: 16px;
        height: 16px;
    }

    .advance{
        padding: 15px;
    }

    /* Tabs */
    .tabs-container {
        margin-top: 2rem;
        width: 100%;
    }

    .tabs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 1rem;
        position: fixed;
        top: 96px;
        z-index: 2;
       /* border: solid 2px red; */
       width: 100%;
       padding: 20px;
       background-color: white;
    }

    .tabs-list {
        display: flex;
        background-color: #e5e7eb;
        border-radius: 0.375rem;
        padding: 0.25rem;
     
    }

    .tab-btn {
        padding: 0.5rem 1rem;
        border: none;
        background: none;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4b5563;
        cursor: pointer;
        transition: all 0.2s;
    }

    .tab-btn:hover {
        background-color: rgba(255, 255, 255, 0.5);
    }

    .tab-btn.active {
        background-color: white;
        color: #111827;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    /* Card */
    .card {
        background-color: white;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-top: 200px;

    }

    /* Table */
    .table-container {
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th,
    .data-table td {
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .data-table th {
        background-color: #f3f4f6;
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tbody tr:hover {
        background-color:rgb(204, 211, 209);
    }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-primary {
        background-color: #059669;
        color: white;
    }

    .btn-primary:hover {
        background-color: #047857;
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid #d1d5db;
    }

    .btn-outline:hover {
        background-color: #f3f4f6;
    }

    .btn-blue {
        color: #2563eb;
        border-color: #bfdbfe;
    }

    .btn-blue:hover {
        background-color: #eff6ff;
    }

    .btn-red {
        color: #dc2626;
        border-color: #fecaca;
    }

    .btn-red:hover {
        background-color: #fee2e2;
    }

    .btn-green {
        color: #16a34a;
        border-color: #bbf7d0;
    }

    .btn-green:hover {
        background-color: #dcfce7;
    }

    .btn-icon {
        margin-right: 0.5rem;
        width: 16px;
        height: 16px;
    }

    .btn-icon-sm {
        margin-right: 0.25rem;
        width: 14px;
        height: 14px;
    }

  

    /* Responsive */
    @media (min-width: 768px) {
        .header-content {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .search-section {
            width: auto;
        }
    }

   
</style>