<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    {{ Breadcrumbs::render(\Illuminate\Support\Facades\Route::currentRouteName()) }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->