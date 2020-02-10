drop table if exists pessoas;
drop sequence if exists pessoas_seq;

create table pessoas (
    id serial primary key,
    primeiro_nome varchar(255) not null,
    sobrenome varchar(255) not null,
    email varchar(255) not null,
    senha varchar(255) not null
);

create sequence pessoas_seq increment 1 minvalue 1 start 1;
alter table pessoas alter column id set default nextval('pessoas_seq');

drop table if exists servicos;
drop sequence if exists servicos_seq;

create table servicos (
	id serial primary key,
	nome varchar(255) not null,
	preco float not null
);

create sequence servicos_seq increment 1 start 1 minvalue 1;
alter table servicos alter column id set default nextval('servicos_seq');

drop table if exists vendas;
drop sequence if exists vendas_seq;

create table vendas(
	id serial primary key,
	id_pessoa int references pessoas(id),
	id_servico int references servicos(id)
);

create sequence vendas_seq increment 1 minvalue 1 start 1;
alter table vendas alter column id set default nextval('vendas_seq');

create table funcionarios (
	id serial primary key,
	name varchar(255) not null,
	email varchar(255) not null,
	password varchar(32) not null
);

create sequence funcionarios_seq increment 1 start 1 minvalue 1;
alter table funcionarios alter column id set default nextval('funcionarios_seq');

alter table servicos add column data_vencimento date null;

update servicos set data_vencimento = current_date;
