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
