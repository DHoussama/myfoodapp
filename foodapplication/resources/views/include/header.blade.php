<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/images/hamahama.jpg"  class="rounded-circle" width="60">
    </a>
    <a class="navbar-brand" href="#">HamHama</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="{{route("Dashboard")}}">Home</a>
        <a class="nav-link" href="{{route("products")}}">Products</a>
        <a class="nav-link" href="{{route("Order.list")}}">Orders</a>
        <a class="nav-link" href="{{route("logout")}}">Logout</a>
      </div>
    </div>
  </div>
</nav>