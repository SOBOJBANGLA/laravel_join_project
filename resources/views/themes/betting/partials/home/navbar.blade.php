<!-- Toggle Button -->
<button class="btn btn-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="fas fa-bars"></i> Menu
</button>

<!-- Sidebar Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="exampleAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-primary text-white fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample11">
                        <i class="fas fa-dice"></i> CASINO LIVE
                    </button>
                </h2>
                <div id="collapseExample11" class="accordion-collapse collapse">
                    <div class="accordion-body bg-light">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('dream.gaming')}}" class="text-decoration-none text-dark">
                                    <i class="far fa-circle"></i> Dream Gaming
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('evolution.live')}}" class="text-decoration-none text-dark">
                                    <i class="far fa-circle"></i> Evolution Live
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Add other categories similarly -->

        </div>
    </div>
</div>