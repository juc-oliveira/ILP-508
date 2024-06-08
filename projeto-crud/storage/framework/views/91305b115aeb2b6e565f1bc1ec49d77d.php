<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cavalo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Cavalo</h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('cavalos.update', $cavalo->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo e($cavalo->nome); ?>" required>
            </div>
            <div class="mb-3">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" class="form-control" id="raca" name="raca" value="<?php echo e($cavalo->raca); ?>" required>
            </div>
            <div class="mb-3">
                <label for="dtNasc" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control" id="dtNasc" name="dtNasc" value="<?php echo e($cavalo->dtNasc); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpfTutor" class="form-label">CPF do Tutor</label>
                <input type="text" class="form-control" id="cpfTutor" name="cpfTutor" value="<?php echo e($cavalo->cpfTutor); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="<?php echo e(route('cavalos.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
   
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
</body>
</html><?php /**PATH C:\Users\julia\Documents\ADS - FATEC\Programação Web\projeto-crud\projeto-crud\resources\views/cavalos/edit.blade.php ENDPATH**/ ?>