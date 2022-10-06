CREATE Table categories(
id          int(255) AUTO_INCREMENT not NULL,
name        varchar(255) not NULL,
thumnail    varchar(255), 
created_at  DATETIME,  
updated_at  DATETIMe,
CONSTRAINT pk_categories PRIMARY KEY(id)
)Engine=InnoDB;

CREATE Table role(
id          int(255) AUTO_INCREMENT NOT NULL,
name        varchar(255) not NULL,
created_at  DATETIME,  
updated_at  DATETIME,
CONSTRAINT pk_role PRIMARY KEY(id),
CONSTRAINT uq_name UNIQUE(name)
)Engine=InnoDB;

CREATE Table password_resets(
email       varchar(255) NOT NULL,
token       varchar(255) not NULL,
created_at  DATETIME,  
updated_at  DATETIME,
CONSTRAINT index_email INDEX(email)
)Engine=InnoDB;

CREATE Table users(
id          int(255) AUTO_INCREMENT NOT NULL,
role_id     int(255) ,
full_name   varchar(100) not NULL,
surnames    varchar(100) NOT NULL,
phone       int(10) NOT NULL,
email       varchar(100) NOT NULL,
email_verified_at  DATETIME,
password        varchar(100) not null,
remember_token  varchar(255),
created_at  DATETIME,  
updated_at  DATETIME,
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT fk_user_role FOREIGN KEY(role_id) REFERENCES role(id), 
CONSTRAINT uq_email UNIQUE(email)
)Engine=InnoDB;

CREATE Table products(
id              int(255) AUTO_INCREMENT NOT NULL,
category_id     int(255) ,
barcode         varchar(255) not NULL,
name            varchar(100) NOT NULL,
description     TEXT,
price           float(11,2) NOT NULL,
stock           int(255) NOT NULL,
image_path      varchar(150) NOT NULL,
created_at      DATETIME,  
updated_at      DATETIME,
CONSTRAINT pk_products PRIMARY KEY(id),
CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id), 
CONSTRAINT uq_barcode UNIQUE(barcode)
)Engine=InnoDB;

CREATE Table orders(
id                  int(255) AUTO_INCREMENT NOT NULL,
user_id             int(255) ,
shipping_address    varchar(200) not NULL,
total               float(11,2) NOT NULL,
status              varchar(100),
created_at          DATETIME,  
updated_at          DATETIME,
CONSTRAINT pk_orders PRIMARY KEY(id),
CONSTRAINT fk_orders_users FOREIGN KEY(user_id) REFERENCES users(id) 
)Engine=InnoDB;

CREATE Table orders_detail(
id          int(255) AUTO_INCREMENT NOT NULL,
order_id    int(255) ,
product_id  int(255) ,
price       float(11,2) NOT NULL,
quantity    int(100) NOT NULL,
total       INT(100) NOT NULL,
created_at  DATETIME,  
updated_at  DATETIME,
CONSTRAINT pk_orders_detail PRIMARY KEY(id),
CONSTRAINT fk_detail_order FOREIGN KEY(order_id) REFERENCES orders(id),
CONSTRAINT fk_detail_product FOREIGN KEY(product_id) REFERENCES products(id)
)Engine=InnoDB;


