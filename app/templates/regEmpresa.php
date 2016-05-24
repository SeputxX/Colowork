<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<form name="insertarEMP" action="index.php?ctl=regEmpresa" method="POST">
    <div class="zona">
        <div class="acceso"> 
            <legend>Datos de acceso</legend>
            <b>Nombre Acces:</b><p></p><input placeholder="Solo letras Max 50" type="text" name="user" value="<?php echo $params['user']?>" pattern="([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\ ]){2,50}" required />
            Solo letras Max 50
            <p></p>
            <b>Clave Acceso:</b><p></p><input type="password" name="pass" value="<?php echo $params['pass'] ?>" pattern="[A-Za-z0-9!?-]{8,20}" required />
            Letras y Numeros Min 8 Max 20<p></p>
        </div>
        <div class="contacto">
            <legend>Datos de Contacto</legend>
            <b>Teléfono de empresa:</b><p></p> <input type="text" name="telefono" value="<?php echo $params['telefono']?>" pattern="^[9|6|7][0-9]{8}$" required />
            Solo Numeros <p></p>
            <b>Fax:</b><p></p> <input type="text" name="fax" value="<?php echo $params['fax'] ?>" pattern="([\(\+])?([0-9]{1,3}([\s])?)?([\+|\(|\-|\)|\s])?([0-9]{2,4})([\-|\)|\.|\s]([\s])?)?([0-9]{2,4})?([\.|\-|\s])?([0-9]{4,8}" required/>
            Solo Numeros<p></p>
            <b>Correo:</b><p></p> <input type="text" name="correo" value="<?php echo $params['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,4})$" required/>
            example@loquesea.algo 
        </div>       
    </div>
    <div class="zona2">
        <div class="datosEMP">
            <legend>Datos Empresa</legend>
            <div class="zona4">
              <b>Nombre de la Empresa:</b><p></p><input type="text" name="nombre" value="<?php echo $params['nombre'] ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,50}" required />
              Solo letras Max 50<p></p>
              <b>Actividad de Empresa:</b><p></p>
                  <select  class="actividad" name="actividad" value="<?php echo $params['actividad']?>" required/ >
                      <?php foreach ($params['opact'] as $actividad) : ?> 
                          <option value="<?php echo $actividad['nombre'] ?>"><?php echo $actividad['nombre'] ?></option>
                      <?php  endforeach; ?>
                  </select><p></p>
              <b>Codigo Id. Fiscal:</b><p></p> <input type="text" name="idfiscal" value="<?php echo $params['idfiscal'] ?>" pattern="[0-9]{6}" required />
              Solo Numeros Max 6<p></p>
             <b> Razon social:</b><p></p> <input type="text" name="razon" value="<?php echo $params['razon']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,50}" required/>
              Solo letras Max 50<p></p>
            </div>
            <div class="zona5">
            <b>País:</b><p></p><select id="pais" class="actividad" onchange="select()" name="pais">
                      <option value="España">España</option> 
                      <option value="AF">Afganistán</option> 
                      <option value="AL">Albania</option> 
                      <option value="DE">Alemania</option> 
                      <option value="AD">Andorra</option> 
                      <option value="AO">Angola</option> 
                      <option value="AI">Anguilla</option> 
                      <option value="AQ">Antártida</option> 
                      <option value="AG">Antigua y Barbuda</option> 
                      <option value="AN">Antillas Holandesas</option> 
                      <option value="SA">Arabia Saudí</option> 
                      <option value="DZ">Argelia</option> 
                      <option value="AR">Argentina</option> 
                      <option value="AM">Armenia</option> 
                      <option value="AW">Aruba</option> 
                      <option value="AU">Australia</option> 
                      <option value="AT">Austria</option>  
                      <option value="AZ">Azerbaiyán</option>  
                      <option value="BS">Bahamas</option>  
                      <option value="BH">Bahrein</option>  
                      <option value="BD">Bangladesh</option>  
                      <option value="BB">Barbados</option>  
                      <option value="BE">Bélgica</option>  
                      <option value="BZ">Belice</option>  
                      <option value="BJ">Benin</option>  
                      <option value="BM">Bermudas</option>  
                      <option value="BY">Bielorrusia</option>  
                      <option value="MM">Birmania</option>  
                      <option value="BO">Bolivia</option>  
                      <option value="BA">Bosnia y Herzegovina</option>  
                      <option value="BW">Botswana</option>  
                      <option value="BR">Brasil</option>  
                      <option value="BN">Brunei</option>  
                      <option value="BG">Bulgaria</option>  
                      <option value="BF">Burkina Faso</option>  
                      <option value="BI">Burundi</option>  
                      <option value="BT">Bután</option>  
                      <option value="CV">Cabo Verde</option>  
                      <option value="KH">Camboya</option>  
                      <option value="CM">Camerún</option>  
                      <option value="CA">Canadá</option>  
                      <option value="TD">Chad</option>  
                      <option value="CL">Chile</option>  
                      <option value="CN">China</option>  
                      <option value="CY">Chipre</option>  
                      <option value="VA">Ciudad del Vaticano (Santa Sede)</option>  
                      <option value="CO">Colombia</option>  
                      <option value="KM">Comores</option>  
                      <option value="CG">Congo</option>  
                      <option value="CD">Congo, República Democrática del</option>  
                      <option value="KR">Corea</option>  
                      <option value="KP">Corea del Norte</option>  
                      <option value="CI">Costa de Marfíl</option>  
                      <option value="CR">Costa Rica</option>  
                      <option value="HR">Croacia (Hrvatska)</option>  
                      <option value="CU">Cuba</option>  
                      <option value="DK">Dinamarca</option>  
                      <option value="DJ">Djibouti</option>  
                      <option value="DM">Dominica</option>  
                      <option value="EC">Ecuador</option>  
                      <option value="EG">Egipto</option>  
                      <option value="SV">El Salvador</option>  
                      <option value="AE">Emiratos Árabes Unidos</option>  
                      <option value="ER">Eritrea</option>  
                      <option value="SI">Eslovenia</option>   
                      <option value="US">Estados Unidos</option>  
                      <option value="EE">Estonia</option>  
                      <option value="ET">Etiopía</option>  
                      <option value="FJ">Fiji</option>  
                      <option value="PH">Filipinas</option>  
                      <option value="FI">Finlandia</option>  
                      <option value="FR">Francia</option>  
                      <option value="GA">Gabón</option>  
                      <option value="GM">Gambia</option>  
                      <option value="GE">Georgia</option>  
                      <option value="GH">Ghana</option>  
                      <option value="GI">Gibraltar</option>  
                      <option value="GD">Granada</option>  
                      <option value="GR">Grecia</option>  
                      <option value="GL">Groenlandia</option>  
                      <option value="GP">Guadalupe</option>  
                      <option value="GU">Guam</option>  
                      <option value="GT">Guatemala</option>  
                      <option value="GY">Guayana</option>  
                      <option value="GF">Guayana Francesa</option>  
                      <option value="GN">Guinea</option>  
                      <option value="GQ">Guinea Ecuatorial</option>  
                      <option value="GW">Guinea-Bissau</option>  
                      <option value="HT">Haití</option>  
                      <option value="HN">Honduras</option>  
                      <option value="HU">Hungría</option>  
                      <option value="IN">India</option>  
                      <option value="ID">Indonesia</option>  
                      <option value="IQ">Irak</option>  
                      <option value="IR">Irán</option>  
                      <option value="IE">Irlanda</option>  
                      <option value="BV">Isla Bouvet</option>  
                      <option value="CX">Isla de Christmas</option>  
                      <option value="IS">Islandia</option>  
                      <option value="KY">Islas Caimán</option>  
                      <option value="CK">Islas Cook</option>  
                      <option value="CC">Islas de Cocos o Keeling</option>  
                      <option value="FO">Islas Faroe</option>  
                      <option value="HM">Islas Heard y McDonald</option>  
                      <option value="FK">Islas Malvinas</option>  
                      <option value="MP">Islas Marianas del Norte</option>  
                      <option value="MH">Islas Marshall</option>  
                      <option value="UM">Islas menores de Estados Unidos</option>  
                      <option value="PW">Islas Palau</option>  
                      <option value="SB">Islas Salomón</option>  
                      <option value="SJ">Islas Svalbard y Jan Mayen</option>  
                      <option value="TK">Islas Tokelau</option>  
                      <option value="TC">Islas Turks y Caicos</option>  
                      <option value="VI">Islas Vírgenes (EE.UU.)</option>  
                      <option value="VG">Islas Vírgenes (Reino Unido)</option>  
                      <option value="WF">Islas Wallis y Futuna</option>  
                      <option value="IL">Israel</option>  
                      <option value="IT">Italia</option>  
                      <option value="JM">Jamaica</option>  
                      <option value="JP">Japón</option>  
                      <option value="JO">Jordania</option>  
                      <option value="KZ">Kazajistán</option>  
                      <option value="KE">Kenia</option>  
                      <option value="KG">Kirguizistán</option>  
                      <option value="KI">Kiribati</option>  
                      <option value="KW">Kuwait</option>  
                      <option value="LA">Laos</option>  
                      <option value="LS">Lesotho</option>  
                      <option value="LV">Letonia</option>  
                      <option value="LB">Líbano</option>  
                      <option value="LR">Liberia</option>  
                      <option value="LY">Libia</option>  
                      <option value="LI">Liechtenstein</option>  
                      <option value="LT">Lituania</option>  
                      <option value="LU">Luxemburgo</option>  
                      <option value="MK">Macedonia, Ex-República Yugoslava de</option>  
                      <option value="MG">Madagascar</option>  
                      <option value="MY">Malasia</option>  
                      <option value="MW">Malawi</option>  
                      <option value="MV">Maldivas</option>  
                      <option value="ML">Malí</option>  
                      <option value="MT">Malta</option>  
                      <option value="MA">Marruecos</option>  
                      <option value="MQ">Martinica</option>  
                      <option value="MU">Mauricio</option>  
                      <option value="MR">Mauritania</option>  
                      <option value="YT">Mayotte</option>  
                      <option value="MX">México</option>  
                      <option value="FM">Micronesia</option>  
                      <option value="MD">Moldavia</option>  
                      <option value="MC">Mónaco</option>  
                      <option value="MN">Mongolia</option>  
                      <option value="MS">Montserrat</option>  
                      <option value="MZ">Mozambique</option>  
                      <option value="NA">Namibia</option>  
                      <option value="NR">Nauru</option>  
                      <option value="NP">Nepal</option>  
                      <option value="NI">Nicaragua</option>  
                      <option value="NE">Níger</option>  
                      <option value="NG">Nigeria</option>  
                      <option value="NU">Niue</option>  
                      <option value="NF">Norfolk</option>  
                      <option value="NO">Noruega</option>  
                      <option value="NC">Nueva Caledonia</option>  
                      <option value="NZ">Nueva Zelanda</option>  
                      <option value="OM">Omán</option>  
                      <option value="NL">Países Bajos</option>  
                      <option value="PA">Panamá</option>  
                      <option value="PG">Papúa Nueva Guinea</option>  
                      <option value="PK">Paquistán</option>  
                      <option value="PY">Paraguay</option>  
                      <option value="PE">Perú</option>  
                      <option value="PN">Pitcairn</option>  
                      <option value="PF">Polinesia Francesa</option>  
                      <option value="PL">Polonia</option>  
                      <option value="PT">Portugal</option>  
                      <option value="PR">Puerto Rico</option>  
                      <option value="QA">Qatar</option>  
                      <option value="UK">Reino Unido</option>  
                      <option value="CF">República Centroafricana</option>  
                      <option value="CZ">República Checa</option>  
                      <option value="ZA">República de Sudáfrica</option>  
                      <option value="DO">República Dominicana</option>  
                      <option value="SK">República Eslovaca</option>  
                      <option value="RE">Reunión</option>  
                      <option value="RW">Ruanda</option>  
                      <option value="RO">Rumania</option>  
                      <option value="RU">Rusia</option>  
                      <option value="EH">Sahara Occidental</option>  
                      <option value="KN">Saint Kitts y Nevis</option>  
                      <option value="WS">Samoa</option>  
                      <option value="AS">Samoa Americana</option>  
                      <option value="SM">San Marino</option>  
                      <option value="VC">San Vicente y Granadinas</option>  
                      <option value="SH">Santa Helena</option>  
                      <option value="LC">Santa Lucía</option>  
                      <option value="ST">Santo Tomé y Príncipe</option>  
                      <option value="SN">Senegal</option>  
                      <option value="SC">Seychelles</option>  
                      <option value="SL">Sierra Leona</option>  
                      <option value="SG">Singapur</option>  
                      <option value="SY">Siria</option>  
                      <option value="SO">Somalia</option>  
                      <option value="LK">Sri Lanka</option>  
                      <option value="PM">St. Pierre y Miquelon</option>  
                      <option value="SZ">Suazilandia</option>  
                      <option value="SD">Sudán</option>  
                      <option value="SE">Suecia</option>  
                      <option value="CH">Suiza</option>  
                      <option value="SR">Surinam</option>  
                      <option value="TH">Tailandia</option>  
                      <option value="TW">Taiwán</option>  
                      <option value="TZ">Tanzania</option>  
                      <option value="TJ">Tayikistán</option>  
                      <option value="TF">Territorios franceses del Sur</option>  
                      <option value="TP">Timor Oriental</option>  
                      <option value="TG">Togo</option>  
                      <option value="TO">Tonga</option>  
                      <option value="TT">Trinidad y Tobago</option>  
                      <option value="TN">Túnez</option>  
                      <option value="TM">Turkmenistán</option>  
                      <option value="TR">Turquía</option>  
                      <option value="TV">Tuvalu</option>  
                      <option value="UA">Ucrania</option>  
                      <option value="UG">Uganda</option>  
                      <option value="UY">Uruguay</option>  
                      <option value="UZ">Uzbekistán</option>  
                      <option value="VU">Vanuatu</option>  
                      <option value="VE">Venezuela</option>  
                      <option value="VN">Vietnam</option>  
                      <option value="YE">Yemen</option>  
                      <option value="YU">Yugoslavia</option>  
                      <option value="ZM">Zambia</option>  
                      <option value="ZW">Zimbabue</option> 
                    </select>
            Solo letras Max 50<p></p>
            <div  id="provincia"  style="display:none;">
            <b>Provincia:</b> <p></p> 
                <select name="provincia">                    
                     <option value='alava' <?php if(isset($params['provincia'])){ if($params['provincia']=='alava'){ echo 'selected';}} ?>>Álava</option>
                     <option value='albacete' <?php if(isset($params['provincia'])){ if($params['provincia']=='albacete'){ echo 'selected';}} ?>>Albacete</option>
                     <option value='alicante' <?php if(isset($params['provincia'])){ if($params['provincia']=='alicante'){ echo 'selected';}} ?>>Alicante/Alacant</option>
                     <option value='almeria' <?php if(isset($params['provincia'])){ if($params['provincia']=='almeria'){ echo 'selected';}} ?>>Almería</option>
                     <option value='asturias' <?php if(isset($params['provincia'])){ if($params['provincia']=='asturias'){ echo 'selected';}} ?>>Asturias</option>
                     <option value='avila' <?php if(isset($params['provincia'])){ if($params['provincia']=='avila'){ echo 'selected';}} ?>>Ávila</option>
                     <option value='badajoz' <?php if(isset($params['provincia'])){ if($params['provincia']=='badajoz'){ echo 'selected';}} ?>>Badajoz</option>
                     <option value='barcelona' <?php if(isset($params['provincia'])){ if($params['provincia']=='barcelona'){ echo 'selected';}} ?>>Barcelona</option>
                     <option value='burgos' <?php if(isset($params['provincia'])){ if($params['provincia']=='burgos'){ echo 'selected';}} ?>>Burgos</option>
                     <option value='caceres' <?php if(isset($params['provincia'])){ if($params['provincia']=='caceres'){ echo 'selected';}} ?>>Cáceres</option>
                     <option value='cadiz' <?php if(isset($params['provincia'])){ if($params['provincia']=='cadiz'){ echo 'selected';}} ?>>Cádiz</option>
                     <option value='cantabria' <?php if(isset($params['provincia'])){ if($params['provincia']=='cantabria'){ echo 'selected';}} ?>>Cantabria</option>
                     <option value='castellon' <?php if(isset($params['provincia'])){ if($params['provincia']=='castellon'){ echo 'selected';}} ?>>Castellón/Castelló</option>
                     <option value='ceuta' <?php if(isset($params['provincia'])){ if($params['provincia']=='ceuta'){ echo 'selected';}} ?>>Ceuta</option>
                     <option value='ciudadreal' <?php if(isset($params['provincia'])){ if($params['provincia']=='ciudadreal'){ echo 'selected';}} ?>>Ciudad Real</option>
                     <option value='cordoba' <?php if(isset($params['provincia'])){ if($params['provincia']=='cordoba'){ echo 'selected';}} ?>>Córdoba</option>
                     <option value='cuenca' <?php if(isset($params['provincia'])){ if($params['provincia']=='cuenca'){ echo 'selected';}} ?>>Cuenca</option>
                     <option value='girona' <?php if(isset($params['provincia'])){ if($params['provincia']=='girona'){ echo 'selected';}} ?>>Girona</option>
                     <option value='laspalmas' <?php if(isset($params['provincia'])){ if($params['provincia']=='laspalmas'){ echo 'selected';}} ?>>Las Palmas</option>
                     <option value='granada' <?php if(isset($params['provincia'])){ if($params['provincia']=='granada'){ echo 'selected';}} ?>>Granada</option>
                     <option value='guadalajara' <?php if(isset($params['provincia'])){ if($params['provincia']=='guadalajara'){ echo 'selected';}} ?>>Guadalajara</option>
                     <option value='guipuzcoa' <?php if(isset($params['provincia'])){ if($params['provincia']=='guipuzcoa'){ echo 'selected';}} ?>>Guipúzcoa</option>
                     <option value='huelva' <?php if(isset($params['provincia'])){ if($params['provincia']=='huelva'){ echo 'selected';}} ?>>Huelva</option>
                     <option value='huesca' <?php if(isset($params['provincia'])){ if($params['provincia']=='huesca'){ echo 'selected';}} ?>>Huesca</option>
                     <option value='illes balears' <?php if(isset($params['provincia'])){ if($params['provincia']=='illes balears'){ echo 'selected';}} ?>>Illes Balears</option>
                     <option value='jaen' <?php if(isset($params['provincia'])){ if($params['provincia']=='jaen'){ echo 'selected';}} ?>>Jaén</option>
                     <option value='acoruña' <?php if(isset($params['provincia'])){ if($params['provincia']=='acoruña'){ echo 'selected';}} ?>>A Coruña</option>
                     <option value='la rioja' <?php if(isset($params['provincia'])){ if($params['provincia']=='la rioja'){ echo 'selected';}} ?>>La Rioja</option>
                     <option value='leon' <?php if(isset($params['provincia'])){ if($params['provincia']=='leon'){ echo 'selected';}} ?>>León</option>
                     <option value='lleida' <?php if(isset($params['provincia'])){ if($params['provincia']=='lleida'){ echo 'selected';}} ?>>Lleida</option>
                     <option value='lugo' <?php if(isset($params['provincia'])){ if($params['provincia']=='lugo'){ echo 'selected';}} ?>>Lugo</option>
                     <option value='madrid' <?php if(isset($params['provincia'])){ if($params['provincia']=='madrid'){ echo 'selected';}} ?>>Madrid</option>
                     <option value='malaga' <?php if(isset($params['provincia'])){ if($params['provincia']=='malaga'){ echo 'selected';}} ?>>Málaga</option>
                     <option value='melilla' <?php if(isset($params['provincia'])){ if($params['provincia']=='melilla'){ echo 'selected';}} ?>>Melilla</option>
                     <option value='murcia' <?php if(isset($params['provincia'])){ if($params['provincia']=='murcia'){ echo 'selected';}} ?>>Murcia</option>
                     <option value='navarra' <?php if(isset($params['provincia'])){ if($params['provincia']=='navarra'){ echo 'selected';}} ?>>Navarra</option>
                     <option value='ourense' <?php if(isset($params['provincia'])){ if($params['provincia']=='ourense'){ echo 'selected';}} ?>>Ourense</option>
                     <option value='palencia' <?php if(isset($params['provincia'])){ if($params['provincia']=='palencia'){ echo 'selected';}} ?>>Palencia</option>
                     <option value='pontevedra' <?php if(isset($params['provincia'])){ if($params['provincia']=='pontevedra'){ echo 'selected';}} ?>>Pontevedra</option>
                     <option value='salamanca' <?php if(isset($params['provincia'])){ if($params['provincia']=='salamanca'){ echo 'selected';}} ?>>Salamanca</option>
                     <option value='segovia' <?php if(isset($params['provincia'])){ if($params['provincia']=='segovia'){ echo 'selected';}} ?>>Segovia</option>
                     <option value='sevilla' <?php if(isset($params['provincia'])){ if($params['provincia']=='sevilla'){ echo 'selected';}} ?>>Sevilla</option>
                     <option value='soria' <?php if(isset($params['provincia'])){ if($params['provincia']=='soria'){ echo 'selected';}} ?>>Soria</option>
                     <option value='tarragona' <?php if(isset($params['provincia'])){ if($params['provincia']=='tarragona'){ echo 'selected';}} ?>>Tarragona</option>
                     <option value='santacruztenerife' <?php if(isset($params['provincia'])){ if($params['provincia']=='santacruztenerife'){ echo 'selected';}} ?>>Santa Cruz de Tenerife</option>
                     <option value='teruel' <?php if(isset($params['provincia'])){ if($params['provincia']=='teruel'){ echo 'selected';}} ?>>Teruel</option>
                     <option value='toledo' <?php if(isset($params['provincia'])){ if($params['provincia']=='toledo'){ echo 'selected';}} ?>>Toledo</option>
                     <option value='valencia' <?php if(isset($params['provincia'])){ if($params['provincia']=='valencia'){ echo 'selected';}} ?>>Valencia/Valéncia</option>
                     <option value='valladolid' <?php if(isset($params['provincia'])){ if($params['provincia']=='valladolid'){ echo 'selected';}} ?>>Valladolid</option>
                     <option value='vizcaya' <?php if(isset($params['provincia'])){ if($params['provincia']=='vizcaya'){ echo 'selected';}} ?>>Vizcaya</option>
                     <option value='zamora' <?php if(isset($params['provincia'])){ if($params['provincia']=='zamora'){ echo 'selected';}} ?>>Zamora</option>
                     <option value='zaragoza' <?php if(isset($params['provincia'])){ if($params['provincia']=='zaragoza'){ echo 'selected';}} ?>>Zaragoza</option>
                    </select>
                </div>
                <p></p>
                <b>Población:</b><p></p> <input type="text" name="poblacion" value="<?php echo $params['poblacion']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,50}" required />
                Solo letras  Max 50<p></p>
                 <b>Código Postal:</b> <p></p><input type="text" name="codpostal" value="<?php echo $params['codpostal'] ?>" pattern="0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}" required/>
                 Solo Numeros  7
                 <p></p>
                <b>Dirección:</b><p></p> <input type="text" name="direccion" value="<?php echo $params['direccion']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,50}" required />
              <S></S>olo letras Max 50<p></p>
              
                <p></p>
            
           
            </div>
        </div>
        <input type="hidden" name="rol" value="empresa"/>
      <input type="submit" value="insertar" name="insertar" />
    </div>
       
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>