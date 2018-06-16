create table ingrediente(
	idIngrediente integer primary key,
	descricao varchar(100) not null,
	unidadeMedida varchar(10) not null,
	porcao numeric(10,2) not null,
	preco numeric(10,2) not null
);

create sequence seqIdIngrediente;

alter table ingrediente add constraint uk1_ingrediente unique (descricao, unidadeMedida, porcao);

insert into ingrediente values (nextval('seqIdIngrediente'), 'Hamburguer de Costela', 'MG', 180, 1);


alter table ingrediente add constraint Ck1_ingrediente CHECK (unidadeMedida IN ('Unidade', 'MG', 'ML'));

create table ingrediente(
	idIngrediente integer primary key,
	descricao varchar(100) not null,
	unidadeMedida varchar(10) not null,
	porcao numeric(10,2) not null,
	preco numeric(10,2) not null
);

create table itemCardapio(
	id  integer primary key,
	percentualLucro numeric(10,2) not null,
	precoVendaIndicado numeric(10,2) not null,
	descricao varchar(100) not null
);

create sequence seqIdItemCardapio;

create table ingredienteItemCardapio(
	idIngrediente integer,
	idItem integer,
	quantidade integer
);


