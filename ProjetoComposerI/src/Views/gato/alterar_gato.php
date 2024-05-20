<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alterar Gato</title>
  </head>
  <body>
    <main class="container">
        <h3>Alterar Gato</h3>
        <form action="/gato/editar" method="post">
            <input type="hidden" name="id_gato" value="<?= $resultado["id_gato"] ?>">
            
            <div class="row">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" 
                                value="<?= $resultado['nome'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="raca" class="form-label">Raça:</label>
                    <input type="text" name="raca" class="form-control" 
                                value="<?= $resultado['raca'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="dtNasc" class="form-label">Data Nascimento:</label>
                    <input type="text" name="dtNasc" class="form-control" 
                                value="<?= $resultado['dtNasc'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="cpf_tutor" class="form-label">CPF do Tutor:</label>
                    <input type="text" name="cpf_tutor" class="form-control" 
                                value="<?= $resultado['cpf_tutor'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>