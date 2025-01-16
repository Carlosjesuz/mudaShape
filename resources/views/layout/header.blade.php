<header class="default-header @if (request()->routeIs('home')) home-header @endif">
  @if (request()->routeIs('home'))
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid " style="background-color: #0056b3;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="profile-section">
              <div class="profile-photo">
                  <img src="https://via.placeholder.com/60" alt="Foto do Perfil">
              </div>
              <div class="profile-text">
                  <div class="welcome-text">Bem-vindo!</div>
                  <a href="#" class="logout-link">Sair</a>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  @endif 
</header>  