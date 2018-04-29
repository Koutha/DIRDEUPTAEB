--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: T_prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "T_prueba" (
    id_prueba character varying NOT NULL,
    nombre character varying(255),
    descripcion character varying(255),
    tipo_prueba character varying(255),
    objetivo character varying(255),
    unidad character varying(255),
    rango1 integer,
    rango2 integer,
    rango3 integer,
    rango4 integer,
    status integer DEFAULT 1 NOT NULL,
    condicion integer
);


ALTER TABLE "T_prueba" OWNER TO postgres;

--
-- Name: TABLE "T_prueba"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "T_prueba" IS 'Tabla con la informacion y caracteristicas de los TEST o pruebas que realizaran los entrenadores a los atletas';


--
-- Name: COLUMN "T_prueba".id_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".id_prueba IS 'indice de la tabla: identificacion o codigo de la prueba';


--
-- Name: COLUMN "T_prueba".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".nombre IS 'nombre de la prueba o TEST';


--
-- Name: COLUMN "T_prueba".descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".descripcion IS 'descripcion de la prueba o TEST, como debe ser ejecutado, indicaciones';


--
-- Name: COLUMN "T_prueba".tipo_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".tipo_prueba IS 'Capacidad fisica que emplea la prueba puede ser: VELOCIDAD, FUERZA, RESISTENCIA, FLEXIBILIDAD, EQUILIBRIO.';


--
-- Name: COLUMN "T_prueba".objetivo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".objetivo IS 'Breve descripcion del objetivo de la prueba: Ejemplo: Medir la fuerza-resistencia de los músculos lumbo-abdominales (test de abdominales superiores )';


--
-- Name: COLUMN "T_prueba".unidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".unidad IS 'unidad de medida de la prueba puede ser Centimetos, Metros, Kilometros, Segundos, Minutos.';


--
-- Name: COLUMN "T_prueba".rango1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango1 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango2 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango3 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango4; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".rango4 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "T_prueba".condicion IS 'determina la condicion para el calculo de la evaluacion de la prueba 0; valores menores. 1 ; para valores mayores';


--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "T_prueba_id_prueba_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "T_prueba_id_prueba_seq" OWNER TO postgres;

--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "T_prueba_id_prueba_seq" OWNED BY "T_prueba".id_prueba;


--
-- Data for Name: T_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"T_prueba_id_prueba_seq"', 2, true);


--
-- Name: T_prueba T_prueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "T_prueba"
    ADD CONSTRAINT "T_prueba_pkey" PRIMARY KEY (id_prueba);


--
-- PostgreSQL database dump complete
--

