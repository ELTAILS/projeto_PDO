<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Projeto de Cadastro</title>
</head>
<body class="container"> 
    <div class="alert alert-danger" role="alert" style="margin-top: 2rem;">
        <small>Atenção, não coloque email reais, esse projeto é apenas uma demostração de PDO com banco de dados!</small> 
    </div> 
    <h1 class="h1">Cadastro de usuario</h1> 

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"> 
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label> 
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome completo" name="nome" require>
        </div> 
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" require>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="12345-6789" name="telefone" require>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Editar pelo id</label>
            </div>
            <div class="col-auto">
                <input type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="editar" min="1">
                <small>Esse bloco é para editar um cadastro pelo id, ignore ele se for criar um cadastro</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button> 
    </form>
    
    <?php 
        require_once __DIR__ . "/auth.php"; 
        if(!$controller->getTabela()) { 
            $controller->index();
        }
    ?> 

</body>

</html>