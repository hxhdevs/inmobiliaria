<fieldset>
    <legend>Informacion general</legend>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre); ?>">
        
        <label for="Apellido">Apellido:</label>
        <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido" value="<?php echo s($vendedor->apellido); ?>">
</fieldset>
<fieldset>
    <legend>Informacion extra</legend>
    <label for="telefono">Telefono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono vendedor" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>
