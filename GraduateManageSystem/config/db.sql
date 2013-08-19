CREATE TABLE IF NOT EXISTS
`manage_user`
( 
    -- 威胁ID --UUID
    `id` 				BLOB PRIMARY KEY NOT NULL
		DEFAULT ( RANDOMBLOB(16) ),
	-- FK 安全分类所属标准ID
	`username` 			TEXT NOT NULL,	
	-- 威胁名称
    `password` 			TEXT NOT NULL
);
