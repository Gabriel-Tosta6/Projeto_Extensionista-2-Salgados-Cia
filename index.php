<?php require_once 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Salgados & Cia</title>
    <link rel="icon" type="image/png" href="imagens/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="imagens/logo.png" alt="Logo Salgados & Cia" class="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="#cardapio">Cardápio</a></li>
                <li class="nav-item"><a class="nav-link" href="#sobre">Quem Somos?</a></li>
                <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="#localizacao">Localização</a></li>
            </ul>
            <div class="nav-divider me-3"></div>
            <div class="nav-icons">
                <div class="cart-wrapper position-relative">
                    <i class="bi bi-cart2"></i>
                    <span class="cart-badge">3</span>
                </div>
                <i class="bi bi-person-circle" id="userIcon"></i>
            </div>
        </div>
    </div>
</nav>

<div class="login-dropdown" id="loginDropdown">
    <div class="login-box">
        <h6 class="fw-bold mb-2">Entrar</h6>
        <input type="email" class="form-control mb-2" placeholder="E-mail">
        <input type="password" class="form-control mb-3" placeholder="Senha">
        <button class="btn btn-primary w-100 mb-2">Login</button>
        <a href="#" class="text-primary text-decoration-none small d-block text-center">Criar nova conta</a>
    </div>
</div>

<section id="home" class="mt-5 pt-4">
    <div id="carouselLojas" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagens/1.jpg" class="d-block w-100" alt="Loja 1">
            </div>
            <div class="carousel-item">
                <img src="imagens/2.jpeg" class="d-block w-100" alt="Loja 2">
            </div>
            <div class="carousel-item">
                <img src="imagens/3.jpg" class="d-block w-100" alt="Loja 3">
            </div>
            <div class="carousel-item">
                <img src="imagens/4.jpg" class="d-block w-100" alt="Loja 4">
            </div>
        </div>
    </div>
</section>

<section id="cardapio" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Cardápio</h2>
        <div class="row g-4">
            <?php
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <div class="card-custom p-4 shadow-sm rounded text-center h-100 bg-white">
                        <img src="<?php echo htmlspecialchars($row['imagem']); ?>" class="img-fluid rounded mb-3" alt="<?php echo htmlspecialchars($row['nome']); ?>" style="height: 200px; object-fit: cover; width: 100%;">
                        <h4 class="fw-bold"><?php echo htmlspecialchars($row['nome']); ?></h4>
                        <p class="text-muted"><?php echo htmlspecialchars($row['descricao']); ?></p>
                        <h5 class="text-success fw-bold mb-3">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></h5>
                        <button class="btn btn-warning w-100 text-white fw-bold">
                            <i class="bi bi-cart-plus"></i> Adicionar
                        </button>
                    </div>
                </div>
            <?php 
                }
            } else {
                echo "<p class='text-center w-100'>Nenhum salgado cadastrado no momento.</p>";
            }
            ?>
        </div>
    </div>
</section>

<section id="delivery" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Delivery</h2>
        <p class="text-center">Em breve você poderá fazer pedidos diretamente pelo site!</p>
    </div>
</section>

<section id="sobre" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Sobre Nós</h2>
        <p class="text-center">Somos a Salgados & Cia, especializados em salgados tradicionais preparados com ingredientes frescos e de alta qualidade.</p>
    </div>
</section>

<section id="contato" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Contato</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Seu nome:</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail:</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensagem:</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="localizacao" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Nossas Lojas</h2>
        <p class="text-center">Clique para abrir no Google Maps</p>
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <div class="local-box justify-content-center">
                    <a href="#" target="_blank" class="text-decoration-none text-dark">📍 Loja 1 – Centro</a>
                </div>
            </div>
            <div class="col-md-3">
                 <div class="local-box justify-content-center">
                    <a href="#" target="_blank" class="text-decoration-none text-dark">📍 Loja 2 – Norte</a>
                 </div>
            </div>
            <div class="col-md-3">
                 <div class="local-box justify-content-center">
                    <a href="#" target="_blank" class="text-decoration-none text-dark">📍 Loja 3 – Sul</a>
                 </div>
            </div>
            <div class="col-md-3">
                 <div class="local-box justify-content-center">
                    <a href="#" target="_blank" class="text-decoration-none text-dark">📍 Loja 4 – Bairro Novo</a>
                 </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.197!2d-46.6!3d-23.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMwJzAwLjAiUyA0NsKwMzYnMDAuMCJX!5e0!3m2!1spt-BR!2sbr!4v1" width="100%" height="350" style="border:0;" allowfullscreen loading="lazy"></iframe>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2025 Salgados & Cia</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts/script.js"></script>

</body>
</html>