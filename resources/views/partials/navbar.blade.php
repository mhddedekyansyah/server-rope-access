<!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    @auth   
              <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                                @csrf
                    <button type="submit" class="btn btn-tranparent btn-sm">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                    </button>
              </form>  
                      
          @endauth

                </nav>
                <!-- End of Topbar -->