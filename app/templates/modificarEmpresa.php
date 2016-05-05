<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<br/>
<form action="index.php?ctl=modificarPerfil" method="POST">
    <table>
        <tr>
            <th>Nombre Acceso *</th><td><input type="text" name="user" value="<?php echo $params['user']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>     
        <tr>
            <th>Nombre de la Empresa *</th><td><input type="text" name="nombre" value="<?php echo $params['datos']['nombre'] ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
        <tr>

            <th>Actividad de Empresa *</th>
            <td>
                <select  class="actividad" name="actividad"  required/ >
                    <?php
                     foreach ($params['opact'] as $actividad) :
                        if($params['datos']['actividad']==$actividad['nombre']){
                            
                            ?>
                        <option value="<?php echo $actividad['nombre'] ?>" selected><?php echo $actividad['nombre'] ?></option>
                            <?php

                        }
                    ?> 
                        
                        <option value="<?php echo $actividad['nombre'] ?>"><?php echo $actividad['nombre'] ?></option>
                    <?php  endforeach; ?>
                </select>
            </td>
            <td class="requisitos"></td>
        </tr>
        <tr>
            <th>Codigo Id. Fiscal *</th><td><input type="text" name="idfiscal" value="<?php echo $params['datos']['idfiscal'] ?>" pattern="[0-9]{6}" required /></td><td class="requisitos">(Solo Numeros. Obligatorio 6 )</td>
        </tr>
        <tr>
            <th>Razon social *</th><td><input type="text" name="razon" value="<?php echo $params['datos']['razon']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
        <tr>
            <th>Dirección *</th><td><input type="text" name="direccion" value="<?php echo $params['datos']['direccion']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
        <tr>
            <th>Población *</th><td><input type="text" name="poblacion" value="<?php echo $params['datos']['poblacion']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
        <tr>
            <th>País *</th><td><input type="text" name="pais" value="<?php echo $params['datos']['pais']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
        <tr>
            <th>Provincia *</th><td><input type="text" name="provincia" value="<?php echo $params['datos']['provincia']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
        <tr>
            <th>Código Postal *</th><td><input type="text" name="codpostal" value="<?php echo $params['datos']['codpostal'] ?>" pattern="0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}" required/></td><td class="requisitos">(Solo Numeros. Obligatorio 7)</td>
        </tr>
        <tr>
            <th>Teléfono de empresa *</th><td><input type="text" name="telefono" value="<?php echo $params['datos']['telefono']?>" pattern="^[9|6|7][0-9]{8}$" required /></td><td class="requisitos">(Solo Numeros. Obligatorio 9)</td>
        </tr>
        <tr>
            <th>Fax *</th><td><input type="text" name="fax" value="<?php echo $params['datos']['fax'] ?>" pattern="([\(\+])?([0-9]{1,3}([\s])?)?([\+|\(|\-|\)|\s])?([0-9]{2,4})([\-|\)|\.|\s]([\s])?)?([0-9]{2,4})?([\.|\-|\s])?([0-9]{4,8}" required/></td><td class="requisitos"> (Solo Numeros. Obligatorio 9. Si no tiene 00000000)</td>
        </tr>
        <tr>
            <th>Correo: </th>
            <td>
                <input type="text" name="correo" value="<?php echo $params['datos']['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>(example@loquesea.algo)
            </td>
        </tr>
        <tr>
           <td></td><td><input type="hidden" name="id" value="<?php echo $params['id'] ?>"/></td>
        </tr>
    </table>
    <input type="submit" value="insertar" name="insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>