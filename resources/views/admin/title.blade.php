 <div class="container">
        <div class="row">
            <h1>Dashboard</h1>
            <div class="mt-2 ml-3">
                <a href="{{ route('admin.dashboard')  }}">
                    <button class="btn-secondary">
                        Add new book
                    </button>
                </a>
                <a href="{{ route('admin.booklist')  }}">
                    <button class="btn-secondary">
                        Show book list
                    </button>
                </a>
                <a href="{{ route('admin.orderlist')  }}">
                    <button class="btn-secondary">
                        Show order list
                    </button>
                </a>
                <a href="{{ url('/catalog')  }}">
                    <button class="btn-secondary">
                        Catalog
                    </button>
                </a>
            </div>
        </div>
 </div>

