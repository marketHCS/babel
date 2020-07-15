drop database tienda;
create database tienda;

use tienda;

create table Estado
(
    id_est  int NOT NULL AUTO_INCREMENT,
    nom_est varchar(30),
    created_at timestamp,
    updated_at timestamp,
    constraint pk1 primary key (id_est)
);
insert into estado
values (1, 'Aguascalientes', now(), now());
insert into estado
values (2, 'Baja california norte');
insert into estado
values (3, 'Baja california sur');
insert into estado
values (4, 'Campeche');
insert into estado
values (5, 'Coahuila');
insert into estado
values (6, 'Colima');
insert into estado
values (7, 'Chiapas');
insert into estado
values (8, 'Chihuahua');
insert into estado
values (9, 'Ciudad de México');
insert into estado
values (10, 'Durango');
insert into estado
values (11, 'Guanajuato');
insert into estado
values (12, 'Guerrero');
insert into estado
values (13, 'Hidalgo');
insert into estado
values (14, 'Jalisco');
insert into estado
values (15, 'Mexico');
insert into estado
values (16, 'Michoacan');
insert into estado
values (17, 'Morelos');
insert into estado
values (18, 'Nayarit');
insert into estado
values (19, 'Nuevo Leon');
insert into estado
values (20, 'Oaxaca');
insert into estado
values (21, 'Puebla');
insert into estado
values (22, 'Queretaro');
insert into estado
values (23, 'Quintana Roo');
insert into estado
values (24, 'San Luis Potosi');
insert into estado
values (25, 'Sinaloa');
insert into estado
values (26, 'Sonora');
insert into estado
values (27, 'Tabasco');
insert into estado
values (28, 'Tamaulipas');
insert into estado
values (29, 'Tlaxcala');
insert into estado
values (30, 'Veracruz');
insert into estado
values (31, 'Yucatan');
insert into estado
values (32, 'Zacatecas');

create table Municipio
(
    id_mun  int NOT NULL AUTO_INCREMENT,
    nom_mun varchar(70),
    id_est  int,
    constraint pk2 primary key (id_mun)
);


alter table municipio
    add constraint fk1 foreign key (id_est) references Estado (id_est) ON DELETE RESTRICT ON UPDATE CASCADE;

insert into municipio
values (1, 'AGUASCALIENTES', 9);
insert into municipio
values (2, 'ASIENTOS', 9);
insert into municipio
values (3, 'CALVILLO', 9);
insert into municipio
values (4, 'COSIO', 9);
insert into municipio
values (5, 'DIXON,CA', 14);
insert into municipio
values (6, 'EL LLANO', 14);
insert into municipio
values (7, 'JESUS MARIA', 14);
insert into municipio
values (8, 'logimayab', 22);
insert into municipio
values (9, 'PABELLON DE ARTEAGA', 22);
insert into municipio
values (10, 'RINCON DE ROMOS', 22);



create table Colonia
(
    id_col  int NOT NULL AUTO_INCREMENT,
    nom_col varchar(50),
    cp      int(5),
    id_mun  int,
    constraint pk3 primary key (id_col),
    constraint fk2 foreign key (id_mun) references Municipio (id_mun) ON DELETE RESTRICT ON UPDATE CASCADE
);
insert into Colonia
values (1, "Vista Alegre", 45678, 1);
insert into Colonia
values (2, "Ignacio Zaragoza", 12345, 1);
insert into Colonia
values (3, "Miguel Hidalgo", 87654, 2);
insert into Colonia
values (4, "Satelite", 12098, 2);
insert into Colonia
values (5, "Las rosas", 29340, 2);
insert into Colonia
values (6, "El Romerillal", 10293, 3);
insert into Colonia
values (7, "Paraiso", 76148, 4);
insert into Colonia
values (8, "15 de mayo", 12312, 5);
insert into Colonia
values (9, "Independencia", 34345, 6);
insert into Colonia
values (10, "5 de febrero", 90343, 7);
insert into Colonia
values (11, "Primavera", 90812, 8);
insert into Colonia
values (12, "10 de abril", 90564, 8);
insert into Colonia
values (13, "Iguazú", 789321, 8);
insert into Colonia
values (14, "Paseos de san Miguel", 12221, 9);
insert into Colonia
values (15, "Mompani", 23908, 10);

create table Direccion
(
    id_dir int NOT NULL AUTO_INCREMENT,
    calle  varchar(100),
    no_ex  int,
    no_int int,
    id_col int,
    constraint pk4 primary key (id_dir),
    constraint fk3 foreign key (id_col) references Colonia (id_col) ON DELETE RESTRICT ON UPDATE CASCADE
);

insert into Direccion
values (1, "Universidad", 13, 1, 1);
insert into Direccion
values (2, "Los arcos", 45, 23, 2);
insert into Direccion
values (3, "Margarita", 91, null, 3);
insert into Direccion
values (4, "Amatista", 12, 2, 4);
insert into Direccion
values (5, "El globo", 90, null, 5);
insert into Direccion
values (7, "Independecia", 13, null, 7);
insert into Direccion
values (6, "Flores Magon", 2, null, 6);
insert into Direccion
values (8, "De la Paz", 9, null, 8);
insert into Direccion
values (9, "Palameres", 8, null, 9);
insert into Direccion
values (10, "Portal de San Miguel", 34, null, 10);
insert into Direccion
values (11, "El Lienzo", 3, null, 11);
insert into Direccion
values (12, "Las Flores", 12, null, 12);
insert into Direccion
values (13, "Escoral", 24, null, 13);
insert into Direccion
values (14, "Parlamento", 1034, null, 14);
insert into Direccion
values (15, "La RAza", 153, null, 15);
insert into Direccion
values (16, "Fray Servando", 210, null, 1);
insert into Direccion
values (17, "Córdova", 113, null, 2);
insert into Direccion
values (18, "Anzures", 912, null, 3);
insert into Direccion
values (19, "Los Heróes", 26, null, 4);
insert into Direccion
values (20, "Condesa", 89, null, 5);
insert into Direccion
values (21, "Paseos", 19, 4, 6);
insert into Direccion
values (22, "Luis Linas", 5, 6, 7);
insert into Direccion
values (23, "Tlaloc", 91, null, 8);
insert into Direccion
values (24, "Laguna", 200, 89, 9);
insert into Direccion
values (25, "Mayrán", 409, 233, 10);
insert into Direccion
values (26, "Av. Revolución", 40, null, 11);
insert into Direccion
values (27, "Gúzman", 349, 345, 12);
insert into Direccion
values (28, "La Negreta", 93, null, 13);
insert into Direccion
values (29, "Onega", 1234, null, 14);
insert into Direccion
values (30, "Amatista", 34, null, 3);
insert into Direccion
values (31, "Del placer", 23, null, 7);
insert into Direccion
values (32, "Miguel Hidalgo", 67, null, 13);

create table Sucursal
(
    id_suc  int NOT NULL AUTO_INCREMENT,
    nom_suc varchar(30),
    id_dir  int,
    constraint pk5 primary key (id_suc),
    constraint fk4 foreign key (id_dir) references Direccion (id_dir)
);
insert into Sucursal
values (0, "SUCURSAL CDMX", 1),
       (0, "SUCURSAL JALISO", 5),
       (0, "SUCURSAL", 8);


create table Categoria
(
    id_cat  int NOT NULL AUTO_INCREMENT,
    nom_cat varchar(100),
    constraint pk6 primary key (id_cat)
);
insert into Categoria
values (0, "Bebé"),
       (0, "Niño"),
       (0, "Niña"),
       (0, "Dama"),
       (0, "Caballero");



create table Tipo
(
    id_tipo  int NOT NULL AUTO_INCREMENT,
    nom_tipo varchar(100),
    constraint pk7 primary key (id_tipo)
);

insert into Tipo
values (0, "Playera"),
       (0, "Camisa"),
       (0, "Blusa"),
       (0, "Sudadera"),
       (0, "Pantalón");



create table Proveedor
(
    id_prov     int NOT NULL AUTO_INCREMENT,
    nom_prov    varchar(30),
    ap_prov     varchar(50),
    am_prov     varchar(30),
    desc_prov   varchar(30),
    correo_prov varchar(70) unique,
    rfc_prov    varchar(13),
    constraint pk8 primary key (id_prov)
);

ALTER TABLE PROVEEDOR
    ADD UNIQUE INDEX PROV (CORREO_PROV);


insert into Proveedor
values (0, "Antonio", "Resendiz", "Martinez", "Prendas textiles", "antonioresendiz@gmail.com", "REMA029369I19"),
       (0, "Monserrat", "Hernández", "Guevara", "Textiles SA de CV.", "textiles123@hotmail.com", "HEGM120890V27"),
       (0, "Luis", "Luna", "Carbajal", "Prendas de Mexico", "prendasmex123@gmail.com", "LUCL091296"),
       (0, "Miguel", "Díaz", "Bermudez", "Distribuidora de textiles", "migueldiaz@gmail.com", "BEBM345679I11"),
       (0, "Santiago", "Lopez", "Mendoza", "Textles lopez", "santiago123@gmail.com", "LOMS231199HU");

create table Usuario
(
    nom_us  varchar(60) NOT NULL unique,
    pass_us BLOB,
    tipo_us int,
    constraint pk9 primary key (nom_us)
);

ALTER TABLE USUARIO
    ADD UNIQUE INDEX USU (NOM_US);

delimiter //
create trigger encripta
    before insert
    on usuario
    for each row
begin
    set new.pass_us = aes_encrypt(new.pass_us, "UTEQDTAI");
end //
delimiter ;


insert into Usuario
values ("hector12", "12345", 1),
       ("Veronica2", "veronica3299", 1),
       ("Alma123", "alma987", 1),
       ("Sergio123", "Ser9090", 2),
       ("Antonio1", "Antoni78", 2),
       ("Victor1", "Vic1019", 2),
       ("Carlos1", "Charly14a", 2),
       ("Omar1123", "Omarcito101", 2);



create table Administrador
(
    id_adm     int NOT NULL AUTO_INCREMENT,
    nom_adm    varchar(30),
    ap_adm     varchar(30),
    am_adm     varchar(30),
    correo_adm varchar(60),
    nom_us     varchar(60),
    id_suc     int,
    constraint pk10 primary key (id_adm),
    constraint fk5 foreign key (nom_us) references Usuario (nom_us) ON DELETE RESTRICT ON UPDATE CASCADE,
    constraint fk6 foreign key (id_Suc) references Sucursal (id_suc) ON DELETE cascade ON UPDATE CASCADE
);



ALTER TABLE ADMINISTRADOR
    ADD UNIQUE INDEX ADM (nom_adm, ap_adm, am_adm);
ALTER TABLE ADMINISTRADOR
    ADD UNIQUE INDEX correoADM (correo_adm);



insert into Administrador
values (0, "Hector Arath", "Escobedo", "Olguin", "hector123@gmail.com", "hector12", 1),
       (0, "Verónica", "Lorenzo", "Alavez", "veronicalorenzo1999@gmail.com", "Veronica2", 2),
       (0, "Alma", "Lopez", "Villegas", "alma123@gmail.com", "Alma123", 3);

create table Cliente
(
    id_clie     int NOT NULL AUTO_INCREMENT,
    nom_clie    varchar(30),
    ap_clie     varchar(30),
    am_clie     varchar(30),
    correo_clie varchar(60),
    rfc_clie    varchar(17),
    id_dir      int,
    nom_us      varchar(60),
    constraint pk11 primary key (id_clie),
    constraint fk7 foreign key (id_dir) references Direccion (id_dir),
    constraint fk8 foreign key (nom_us) references Usuario (nom_us) ON DELETE RESTRICT ON UPDATE CASCADE
);

ALTER TABLE CLIENTE
    ADD UNIQUE INDEX CLIE (nom_clie, ap_clie, am_clie);
ALTER TABLE CLIENTE
    ADD UNIQUE INDEX CorreoClie (correo_clie);


insert into Cliente
values (0, "Sergio", "López", "Sánchez", "sergiolopez@gmail.com", "ert234567", 2, "Sergio123"),
       (0, "Antonio", "Perez", "Hernández", "antonioperez1@gmail.com", "sdfg234567", 4, "Antonio1"),
       (0, "Victor", "Tapia", "Martinez", "victapaia12@gmail.com", "lkhgf345", 4, "Victor1"),
       (0, "Carlos", "Medina", "Noguez", "carlosmedina1@gmail.com", "Cjhgfd678", 5, "Carlos1"),
       (0, "Omar", "Mejía", "Rodriguez", "omarmejia@gmail.com", "p987654f", 7, "Omar1123");


create table Telefono
(
    id_tel  int NOT NULL AUTO_INCREMENT,
    num_tel char(13),
    id_clie int,
    id_suc  int,
    id_prov int,
    constraint pk12 primary key (id_tel),
    constraint fk10 foreign key (id_clie) references Cliente (id_clie) ON DELETE set null ON UPDATE CASCADE,
    constraint fk11 foreign key (id_suc) references Sucursal (id_suc) ON DELETE cascade ON UPDATE CASCADE,
    constraint fk12 foreign key (id_prov) references Proveedor (id_prov) ON DELETE cascade ON UPDATE CASCADE
);

insert into telefono
values (0, "44256789231", 1, null, null),
       (0, "4467132456", 2, null, null),
       (0, "4457890129", 2, null, null),
       (0, "5567324150", 3, null, null),
       (0, "5612341266", 4, null, null),
       (0, "4429090189", 5, null, null),
       (0, "5612899911", null, 1, null),
       (0, "4467162699", null, 2, null),
       (0, "4410102938", null, 3, null),
       (0, "4412901029", null, null, 1),
       (0, "4412309023", null, null, 1),
       (0, "4290653411", null, null, 2),
       (0, "5512347878", null, null, 2),
       (0, "4231674511", null, null, 3),
       (0, "5590765644", null, null, 4),
       (0, "5556433312", null, null, 4),
       (0, "4423563444", null, null, 5);

create table Producto
(
    id_prod     int NOT NULL AUTO_INCREMENT,
    nom_prod    varchar(100),
    desc_prod   varchar(200),
    costo_prod  float(10, 2),
    precio_prod float(10, 2),
    mat_prod    varchar(50),
    img_prod    varchar(100),
    id_tipo     int,
    id_cat      int,
    id_prov     int,
    CHECK (precio_prod > costo_prod),
    constraint pk13 primary key (id_prod),
    constraint fk13 foreign key (id_tipo) references Tipo (id_tipo) ON DELETE cascade ON UPDATE CASCADE,
    constraint fk14 foreign key (id_cat) references Categoria (id_cat) ON DELETE cascade ON UPDATE CASCADE,
    constraint fk15 foreign key (id_prov) references Proveedor (id_prov) ON DELETE cascade ON UPDATE CASCADE
);

ALTER TABLE Producto
    ADD UNIQUE INDEX PROD (nom_prod);
ALTER TABLE Producto
    ADD UNIQUE INDEX IMGPROD (img_prod);


insert into Producto
values (0, "Gerber Body ", "Set de 5 Unidades variadas de Mono para niños", 250, 350, "Algodón", null, 1, 1, 1),
       (0, "Camisa blanca, estampado 2", "Tommy Hilfiger CD87176401", 220, 340, "90% algodón", null, 2, 2, 2),
       (0, "Camisa bajo con nudo", "Camisa amarilla, con nudo bajo de manga a capas", 100, 180, "Poliéster y algodón",
        null, 3, 3, 3),
       (0, "Sudadera Liso Rosa", "Sudaderas Cordón Liso, hombro caido Rosa Casual", 290, 560,
        "97% Poliéster, 3% spandex", NULL, 4, 4, 4),
       (0, "Pantalón chino", "Pantalón  chino cafe regular fit·", 780, 1000, "97% Algodón 3% Elastano", null, 5, 5, 5),
       (0, "Gerber Body estampado ", "Gerber body Mono para niños", 150, 250, "Algodón 100%", null, 1, 1, 1),
       (0, "Camisa roja estampado 2", "Camisa roja Tommy Hilfiger ", 320, 440, "90% algodón", null, 2, 2, 2),
       (0, "Playera top", "Camisa amarilla, con nudo bajo de manga a capas", 100, 180, "Poliéster y algodón", null, 3,
        3, 3),
       (0, "Sudadera Estampado ", "Sudaderas Cordón Liso, hombro caido Rosa Casual", 290, 560, "97% Poliéster", NULL, 4,
        4, 4),
       (0, "Pantalón mezclica", "Pantalón  mezclilla regular fit·", 780, 1000, "97% Algodón 3% Elastano", null, 5, 5,
        5);


create table talla
(
    id_talla  int not null auto_increment,
    nom_talla varchar(30),
    PRIMARY KEY (id_talla)
);

insert into talla
values (0, "Chica"),
       (0, "Mediana"),
       (0, "Grande"),
       (0, "Extra grande");

create table det_talla
(
    id_dtalla int not null auto_increment,
    id_prod   int,
    id_talla  int,
    primary key (id_dtalla),
    foreign key (id_prod) references producto (id_prod) ON DELETE cascade ON UPDATE CASCADE,
    foreign key (id_talla) references talla (id_talla) ON DELETE restrict ON UPDATE CASCADE
);

insert into det_talla
values (0, 1, 1),
       (0, 1, 2),
       (0, 1, 3),
       (0, 1, 4),
       (0, 2, 1),
       (0, 2, 2),
       (0, 2, 3),
       (0, 2, 4),
       (0, 3, 1),
       (0, 3, 2),
       (0, 3, 3),
       (0, 3, 4),
       (0, 4, 1),
       (0, 4, 2),
       (0, 4, 3),
       (0, 4, 4),
       (0, 5, 1),
       (0, 5, 2),
       (0, 5, 3),
       (0, 5, 4),
       (0, 6, 1),
       (0, 6, 2),
       (0, 6, 3),
       (0, 6, 4),
       (0, 7, 1),
       (0, 7, 2),
       (0, 7, 3),
       (0, 7, 4),
       (0, 8, 1),
       (0, 8, 2),
       (0, 8, 3),
       (0, 8, 4),
       (0, 9, 1),
       (0, 9, 2),
       (0, 9, 3),
       (0, 9, 4),
       (0, 10, 1),
       (0, 10, 2),
       (0, 10, 3),
       (0, 10, 4);


create table Inventario
(
    id_inv    int NOT NULL AUTO_INCREMENT,
    exist_inv int,
    stat_inv  varchar(30),
    descuento float(10, 2),
    id_dtalla int,
    id_suc    int,
    PRIMARY KEY (id_inv),
    constraint fk16 foreign key (id_dtalla) references det_talla (id_dtalla) ON DELETE cascade ON UPDATE CASCADE,
    constraint foreign key (id_suc) references Sucursal (id_suc) ON DELETE cascade ON UPDATE CASCADE
);


delimiter //
create trigger descuento
    before insert
    on inventario
    for each row
begin
    case
        when new.stat_inv = "Liquidación" then
            set new.descuento = 0.10;

        when new.stat_inv = "De temporada" then
            set new.descuento = 0;

        end case;
end //

delimiter ;

delimiter //
create trigger descuento_d
    before update
    on inventario
    for each row
begin
    case
        when new.stat_inv = "Liquidación" then
            set new.descuento = 0.10;

        when new.stat_inv = "De temporada" then
            set new.descuento = 0;

        end case;
end //

delimiter ;


insert into inventario
values (0, 54, "De temporada", null, 1, 1),
       (0, 124, "De temporada", null, 5, 1),
       (0, 200, "De temporada", null, 9, 1),
       (0, 230, "De temporada", null, 13, 1),
       (0, 10, "Liquidación", null, 17, 1),
       (0, 13, "De temporada", null, 21, 1),
       (0, 200, "De temporada", null, 25, 1),
       (0, 100, "De temporada", null, 29, 1),
       (0, 120, "De temporada", null, 30, 1),
       (0, 21, "Liquidación", null, 3, 1),
       (0, 54, "De temporada", null, 2, 2),
       (0, 124, "De temporada", null, 6, 2),
       (0, 200, "De temporada", null, 10, 2),
       (0, 230, "De temporada", null, 14, 2),
       (0, 10, "Liquidación", null, 18, 2),
       (0, 13, "De temporada", null, 22, 2),
       (0, 200, "De temporada", null, 26, 2),
       (0, 100, "De temporada", null, 30, 2),
       (0, 120, "De temporada", null, 3, 2),
       (0, 21, "Liquidación", null, 3, 2),
       (0, 54, "De temporada", null, 7, 3),
       (0, 124, "De temporada", null, 11, 3),
       (0, 200, "De temporada", null, 15, 3),
       (0, 230, "De temporada", null, 19, 3),
       (0, 10, "Liquidación", null, 23, 3),
       (0, 21, "Liquidación", null, 27, 3),
       (0, 100, "De temporada", null, 31, 3),
       (0, 80, "De temporada", null, 1, 3),
       (0, 90, "De temporada", null, 5, 3),
       (0, 20, "Liquidación", null, 4, 3),
       (0, 18, "Liquidación", null, 1, 3);



create table Compra
(
    id_com   int NOT NULL AUTO_INCREMENT,
    fec_com  date,
    pago_com float(10, 2),
    id_adm   int,
    primary key (id_com),
    foreign key (id_adm) references ADMINISTRADOR (id_adm)
);

insert into compra
values (0, 20200710, 0, 1);



create table det_com
(
    id_com       int,
    id_inv       int,
    cantidad_com int,
    foreign key (id_com) references Compra (id_com),
    foreign key (id_inv) references Inventario (id_inv) ON DELETE RESTRICT ON UPDATE CASCADE
);



drop PROCEDURE TOTAL_COMPRA;
DELIMITER //

CREATE PROCEDURE TOTAL_COMPRA(in compra int, out total float(10, 2))
BEGIN
    SELECT SUM(cantidad_com * costo_prod)
    into total
    FROM PRODUCTO,
         DET_COM,
         COMPRA,
         INVENTARIO,
         DET_TALLA
    WHERE PRODUCTO.ID_PROD = DET_TALLA.ID_PROD
      AND DET_COM.ID_COM = COMPRA.ID_COM
      AND DET_COM.ID_INV = INVENTARIO.ID_INV
      AND DET_TALLA.ID_DTALLA = INVENTARIO.ID_DTALLA
      and COMPRA.id_com = compra;
END //

DELIMITER ;

drop trigger total_com;
DELIMITER //
CREATE TRIGGER total_com
    AFTER INSERT
    ON det_com
    FOR EACH ROW
BEGIN
    CALL total_compra(new.id_com, @total);
    UPDATE compra
    SET pago_com = @total
    WHERE id_com = new.id_com;
END //
DELIMITER ;


insert into det_com
values (1, 1, 48);

create table Venta
(
    id_vta     int NOT NULL AUTO_INCREMENT,
    fec_vta    date,
    monto_pago float(10, 2),
    status_vta varchar(50),
    id_clie    int,
    constraint pk17 primary key (id_vta),
    constraint fk17 foreign key (id_clie) references Cliente (id_clie) ON DELETE set null ON UPDATE CASCADE
);



insert into Venta
values (0, 20200312, 0, "Finalizado", 1),
       (0, 20200313, 0, "Finalizado", 1),
       (0, 20200327, 0, "Finalizado", 2),
       (0, 20200320, 0, "Finalizado", 3),
       (0, 20200403, 0, "Finalizado", 5),
       (0, 20200405, 0, "Finalizado", 3),
       (0, 20200416, 0, "Finalizado", 4),
       (0, 20200418, 0, "Finalizado", 4),
       (0, 20200512, 0, "Finalizado", 5),
       (0, 20200515, 0, "Finalizado", 2);



create table Pago
(
    id_pago   int NOT NULL AUTO_INCREMENT,
    fec_pago  date,
    tipo_pago varchar(30),
    id_vta    int,
    constraint pk18 primary key (id_pago),
    constraint fk18 foreign key (id_vta) references Venta (id_vta) ON DELETE RESTRICT ON UPDATE RESTRICT
);

insert into Pago
values (0, 20200312, "Debito", 1),
       (0, 20200313, "Debito", 2),
       (0, 20200327, "Paypal", 3),
       (0, 20200320, "Paypal", 4),
       (0, 20200403, "Paypal", 5),
       (0, 20200405, "Paypal", 6),
       (0, 20200416, "Debito", 7),
       (0, 20200418, "Debito", 8),
       (0, 20200512, "Paypal", 9),
       (0, 20200515, "Paypal", 10);


create table Factura
(
    folio_fac int NOT NULL AUTO_INCREMENT,
    fec_fac   date,
    id_vta    int,
    constraint pk19 primary key (folio_fac),
    constraint fk19 foreign key (id_vta) references Venta (id_vta) ON DELETE RESTRICT ON UPDATE RESTRICT
);

insert into Factura
values (0, 20200412, 1),
       (0, 20200427, 3),
       (0, 20200503, 5),
       (0, 20200512, 9),
       (0, 20200515, 10);

create table det_vta
(
    id_vta   int,
    id_inv   int,
    cantidad int,
    constraint fk20 foreign key (id_vta) references Venta (id_vta) ON DELETE RESTRICT ON UPDATE CASCADE,
    constraint fk21 foreign key (id_inv) references Inventario (id_inv) ON DELETE RESTRICT ON UPDATE CASCADE
);


delimiter //
create trigger existencia_menos
    after insert
    on det_vta
    for each row
begin
    update inventario
    set inventario.exist_inv = inventario.exist_inv - new.cantidad
    where inventario.id_inv = new.id_inv;
end //
select *
from inventario//


delimiter //
create trigger existencia_mas
    after insert
    on det_com
    for each row
begin
    update inventario
    set inventario.exist_inv = inventario.exist_inv + new.cantidad_com
    where inventario.id_inv = new.id_inv;
end //
select *
from inventario//



drop PROCEDURE TOT_VTA;
DELIMITER //
CREATE PROCEDURE TOT_VTA(in venta int, out total float(10, 2))
BEGIN

    SELECT SUM(cantidad * precio_prod - (cantidad * precio_prod * descuento))
    into total
    FROM PRODUCTO,
         DET_VTA,
         VENTA,
         INVENTARIO,
         DET_TALLA
    WHERE PRODUCTO.ID_PROD = DET_TALLA.ID_PROD
      AND DET_VTA.ID_VTA = VENTA.ID_VTA
      AND DET_VTA.ID_INV = INVENTARIO.ID_INV
      AND DET_TALLA.ID_DTALLA = INVENTARIO.ID_DTALLA
      and venta.id_vta = venta;

END //

DELIMITER ;

DELIMITER //
CREATE TRIGGER tot
    AFTER INSERT
    ON det_vta
    FOR EACH ROW
BEGIN
    CALL tot_vta(new.id_vta, @total);
    UPDATE venta
    SET monto_pago = @total
    WHERE id_vta = new.id_vta;
END //
DELIMITER ;

insert into det_vta
values (1, 1, 2),
       (1, 2, 2),
       (1, 3, 1),
       (2, 4, 5),
       (2, 5, 1),
       (2, 6, 3),
       (3, 7, 4),
       (3, 8, 2),
       (3, 9, 4),
       (4, 10, 1),
       (4, 11, 2),
       (4, 12, 3),
       (5, 13, 4),
       (5, 14, 2),
       (5, 15, 1),
       (6, 16, 4),
       (6, 17, 2),
       (6, 18, 3),
       (7, 19, 4),
       (7, 20, 5),
       (8, 21, 1),
       (8, 22, 2),
       (9, 23, 3),
       (9, 24, 4),
       (10, 25, 5),
       (10, 26, 6),
       (10, 27, 1);


create table Envio
(
    id_env  int NOT NULL AUTO_INCREMENT,
    fec_env date,
    fec_ent date,
    id_vta  int,
    id_dir  int,
    check (fec_env < fec_ent),
    primary key (id_env),
    foreign key (id_vta) references Venta (id_vta) ON DELETE RESTRICT ON UPDATE RESTRICT,
    foreign key (id_dir) references Direccion (id_dir)
);



create table AUDITA_PROD
(
    usuario    varchar(30),
    fecha_hora datetime,

    id_prod    int,
    old_precio float(10, 2),
    new_precio float(10, 2)
);

delimiter //
create trigger Auditoria
    before update
    on PRODUCTO
    for each row
begin
    insert into AUDITA_PROD
    values (current_user(), now(), new.id_prod, old.precio_prod,
            new.precio_prod);
end //

delimiter ;


delimiter //
create trigger verifica
    before insert
    on venta
    for each row
begin
    if new.fec_vta < now()
    then
        set new.fec_vta = now();
    end if;
end //

delimiter ;



