create table interstate_tickets
(
    key_ticket bigint unsigned auto_increment,
    title varchar(250) not null,
    start timestamp not null,
    finish timestamp not null,
    status tinyint unsigned not null,
    type tinyint unsigned not null,
    data json not null,
    constraint interstate_tickets_pk
        primary key (key_ticket)
);

create table rune_map
(
    key_url varchar(250) not null,
    title varchar(250) not null,
    program text not null,
    constraint rune_map_pk
        primary key (key_url)
);

alter table interstate_tickets
    add key_url varchar(250) default '/map' not null;

alter table interstate_tickets
    add constraint interstate_tickets_rune_map_key_url_fk
        foreign key (key_url) references rune_map (key_url)
            on update cascade on delete cascade;

alter table interstate_tickets
    add majoro tinyint unsigned default 0 not null;

alter table interstate_tickets
    add minoro tinyint unsigned default 0 not null;

alter table interstate_tickets
    add atomico tinyint unsigned default 0 not null;

alter table interstate_tickets
    add uid varchar(1000) default 'root' not null;