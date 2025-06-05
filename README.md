# analisis-tweets-petro
Dashboard sobre el analisis de sentimientos de los tweets y comentarios de la cuenta de X.com de Gustavo Petro

CREATE TABLE tweets (
    tweet_id     BIGINT PRIMARY KEY,
    fecha        TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    texto        TEXT,
    likes        INTEGER DEFAULT 0,
    retweets     INTEGER DEFAULT 0,
    replies      INTEGER DEFAULT 0,
    usuario      VARCHAR(100)
);

CREATE TABLE respuestas_tweets (
    reply_id     BIGINT PRIMARY KEY,
    tweet_id     BIGINT NOT NULL,
    fecha_reply  TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    texto        TEXT,
    likes        INTEGER DEFAULT 0,
    retweets     INTEGER DEFAULT 0,
    replies      INTEGER DEFAULT 0,
    gender       VARCHAR(10),
    usuario      VARCHAR(100),
    CONSTRAINT fk_tweet
        FOREIGN KEY (tweet_id)
        REFERENCES tweets(tweet_id)
        ON DELETE CASCADE
);

CREATE TABLE tweets_python (
    id SERIAL PRIMARY KEY,
    tweet_id TEXT,
    main_tweet TEXT NOT NULL,
    main_tweet_datetime TIMESTAMP,
    comment_username VARCHAR(255),
    comment_time TIMESTAMP,
    comment_text TEXT,
    replies INTEGER DEFAULT 0,
    retweets INTEGER DEFAULT 0,
    likes INTEGER DEFAULT 0,
    sentiment TEXT,
    sentiment_score NUMERIC,
    month DATE
);
