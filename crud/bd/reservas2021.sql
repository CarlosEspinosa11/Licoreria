create table reservas2022(
    res_id int PRIMARY KEY AUTO_INCREMENT,
    res_nombre varchar(60),
    res_celular varchar(30), 
    res_correo varchar(60),
    res_presupuesto varchar(30),
    res_destino varchar(60), 
    res_observaciones varchar(250)
   );

alter table reservas2022 add COLUMN res_fecha date;