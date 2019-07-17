--
-- PostgreSQL database dump
--

-- Dumped from database version 11.3
-- Dumped by pg_dump version 11.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: DIRDEUPTAEB; Type: DATABASE; Schema: -; Owner: Alvaro T
--

CREATE DATABASE "DIRDEUPTAEB" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Venezuela.1252' LC_CTYPE = 'Spanish_Venezuela.1252';


ALTER DATABASE "DIRDEUPTAEB" OWNER TO "Alvaro T";

\connect "DIRDEUPTAEB"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: DATABASE "DIRDEUPTAEB"; Type: COMMENT; Schema: -; Owner: Alvaro T
--

COMMENT ON DATABASE "DIRDEUPTAEB" IS 'Base de datos del sistema de proyecto III seccion IN3321';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: T_atleta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta" (
    cedula_atleta character varying(255) NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    fecha_nacimiento date,
    direccion character varying(255),
    tel_movil character varying(255),
    tel_fijo character varying(255),
    correo character varying(255),
    sexo character varying(255),
    dir_foto character varying(255),
    dir_cedula character varying(255),
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public."T_atleta" OWNER TO postgres;

--
-- Name: TABLE "T_atleta"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta" IS 'Tabla de datos personales del atleta';


--
-- Name: COLUMN "T_atleta".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".cedula_atleta IS 'cedula del atleta';


--
-- Name: COLUMN "T_atleta".nombres; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".nombres IS 'nombres del atleta';


--
-- Name: COLUMN "T_atleta".apellidos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".apellidos IS 'apellidos del atleta';


--
-- Name: COLUMN "T_atleta".fecha_nacimiento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".fecha_nacimiento IS 'fecha de nacimiento';


--
-- Name: COLUMN "T_atleta".direccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".direccion IS 'direccion';


--
-- Name: COLUMN "T_atleta".tel_movil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".tel_movil IS 'telefono movil';


--
-- Name: COLUMN "T_atleta".tel_fijo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".tel_fijo IS 'telefono fijo';


--
-- Name: COLUMN "T_atleta".correo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".correo IS 'correo del atleta';


--
-- Name: COLUMN "T_atleta".sexo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".sexo IS 'sexo del atleta';


--
-- Name: COLUMN "T_atleta".dir_foto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".dir_foto IS 'direccion de la carpeta que contiene la imagen en el servidor';


--
-- Name: COLUMN "T_atleta".dir_cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".dir_cedula IS 'direccion a la cedula en la carpeta del servidor';


--
-- Name: COLUMN "T_atleta".status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta".status IS 'Estado del atleta; 0 para inactivo 1 para activo';


--
-- Name: T_atleta_academico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta_academico" (
    id_aa integer NOT NULL,
    trayecto character varying(10),
    "año_ingreso" character varying(20),
    dir_planilla character varying(255),
    dir_carnet character varying(255),
    cedula_atleta character varying(255),
    id_pnf integer
);


ALTER TABLE public."T_atleta_academico" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_academico"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta_academico" IS 'Tabla con los datos academicos del Atleta';


--
-- Name: COLUMN "T_atleta_academico".id_aa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico".id_aa IS 'indice de la tabla id atleta academico';


--
-- Name: COLUMN "T_atleta_academico".trayecto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico".trayecto IS 'trayecto academico actual';


--
-- Name: COLUMN "T_atleta_academico"."año_ingreso"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico"."año_ingreso" IS 'año de ingreso del atleta a la universidad';


--
-- Name: COLUMN "T_atleta_academico".dir_planilla; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico".dir_planilla IS 'ubicacion del archivo con la foto de la planilla de inscripcion del atleta';


--
-- Name: COLUMN "T_atleta_academico".dir_carnet; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico".dir_carnet IS 'ubicacion del archivo con la imagen del carnet del atleta';


--
-- Name: COLUMN "T_atleta_academico".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico".cedula_atleta IS 'Clave foranea con la cedula del atleta';


--
-- Name: COLUMN "T_atleta_academico".id_pnf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_academico".id_pnf IS 'Clave foranea con el id del PNF';


--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_academico_id_aa_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_academico_id_aa_seq" OWNER TO postgres;

--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_academico_id_aa_seq" OWNED BY public."T_atleta_academico".id_aa;


--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_cedula_atleta_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_cedula_atleta_seq" OWNER TO postgres;

--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_cedula_atleta_seq" OWNED BY public."T_atleta".cedula_atleta;


--
-- Name: T_atleta_disciplina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta_disciplina" (
    id_ad integer NOT NULL,
    cedula_atleta character varying(255),
    id_disciplina integer
);


ALTER TABLE public."T_atleta_disciplina" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_disciplina"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta_disciplina" IS 'Tabla con los atletas por disciplinas';


--
-- Name: COLUMN "T_atleta_disciplina".id_ad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_disciplina".id_ad IS 'indice la tabla: id atleta por disciplina';


--
-- Name: COLUMN "T_atleta_disciplina".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_disciplina".cedula_atleta IS 'Clave foranea con la cedula del atleta';


--
-- Name: COLUMN "T_atleta_disciplina".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_disciplina".id_disciplina IS 'clave foranea con el id de la disciplina';


--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_disciplina_id_ad_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_disciplina_id_ad_seq" OWNER TO postgres;

--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_disciplina_id_ad_seq" OWNED BY public."T_atleta_disciplina".id_ad;


--
-- Name: T_atleta_ejecucion_pdc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta_ejecucion_pdc" (
    id_aep integer NOT NULL,
    fecha_ejecucion date,
    resultado character varying(255),
    cedula_atleta character varying(255),
    id_dp integer
);


ALTER TABLE public."T_atleta_ejecucion_pdc" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_ejecucion_pdc"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta_ejecucion_pdc" IS 'Tabla con los atletas por dia que participaron en el entrenamiento';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".id_aep; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_ejecucion_pdc".id_aep IS 'indice de la tabla: id atleta ejecucion por dia';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".fecha_ejecucion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_ejecucion_pdc".fecha_ejecucion IS 'dia que se realizo la sesion de entrenamiento';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".resultado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_ejecucion_pdc".resultado IS 'resultado evaluativo de forma cualitativa';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_ejecucion_pdc".cedula_atleta IS 'cedula del atleta que ejecuto la sesion de entrenamiento';


--
-- Name: COLUMN "T_atleta_ejecucion_pdc".id_dp; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_ejecucion_pdc".id_dp IS 'clave foranea con el id del dia por programa';


--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_ejecucion_pdc_id_aep_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_ejecucion_pdc_id_aep_seq" OWNER TO postgres;

--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_ejecucion_pdc_id_aep_seq" OWNED BY public."T_atleta_ejecucion_pdc".id_aep;


--
-- Name: T_atleta_medico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta_medico" (
    id_am integer NOT NULL,
    estatura real,
    peso real,
    tipo_sangre character varying(255),
    contacto_emergencia character varying(255),
    tel_contacto character varying(255),
    info_discapacidad character varying(255),
    observaciones character varying(255),
    cedula_atleta character varying(255),
    info_alergias character varying(255)
);


ALTER TABLE public."T_atleta_medico" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_medico"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta_medico" IS 'Tabla con los datos medicos del atelta';


--
-- Name: COLUMN "T_atleta_medico".id_am; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".id_am IS 'indice la tabla: id atleta medico';


--
-- Name: COLUMN "T_atleta_medico".estatura; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".estatura IS 'estatura del atleta';


--
-- Name: COLUMN "T_atleta_medico".peso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".peso IS 'peso del atleta';


--
-- Name: COLUMN "T_atleta_medico".tipo_sangre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".tipo_sangre IS 'tipo de sangre del atleta';


--
-- Name: COLUMN "T_atleta_medico".contacto_emergencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".contacto_emergencia IS 'nombre de la persona para llamar en caso de emergencia';


--
-- Name: COLUMN "T_atleta_medico".tel_contacto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".tel_contacto IS 'Telefono de contacto de emergencia';


--
-- Name: COLUMN "T_atleta_medico".info_discapacidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".info_discapacidad IS 'Informacion de la discapacidad del atleta en caso de tenerla, sino el campo sera vacio';


--
-- Name: COLUMN "T_atleta_medico".observaciones; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".observaciones IS 'campo para observaciones medicas pertinentes';


--
-- Name: COLUMN "T_atleta_medico".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".cedula_atleta IS 'clave foranea con la cedula del atleta';


--
-- Name: COLUMN "T_atleta_medico".info_alergias; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_medico".info_alergias IS 'informacion de las alergias del atleta en caso de tenerla';


--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_medico_id_am_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_medico_id_am_seq" OWNER TO postgres;

--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_medico_id_am_seq" OWNED BY public."T_atleta_medico".id_am;


--
-- Name: T_atleta_prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta_prueba" (
    id_ap integer NOT NULL,
    fecha date,
    medicion character varying(255),
    cedula_atleta character varying(255),
    id_prueba character varying
);


ALTER TABLE public."T_atleta_prueba" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_prueba"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta_prueba" IS 'Tabla con los datos de la ejecucion y resultados de la prueba por atleta';


--
-- Name: COLUMN "T_atleta_prueba".id_ap; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_prueba".id_ap IS 'indice de la tabla: id de atleta por prueba';


--
-- Name: COLUMN "T_atleta_prueba".fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_prueba".fecha IS 'fecha de la ejecucion o aplicacion de la prueba por el atleta';


--
-- Name: COLUMN "T_atleta_prueba".medicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_prueba".medicion IS 'resultado de la prueba por atleta';


--
-- Name: COLUMN "T_atleta_prueba".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_prueba".cedula_atleta IS 'clave foranea con la cedula del atleta que realizo la prueba';


--
-- Name: COLUMN "T_atleta_prueba".id_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_prueba".id_prueba IS 'clave foranea con el id de la prueba o test';


--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_prueba_id_ap_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_prueba_id_ap_seq" OWNER TO postgres;

--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_prueba_id_ap_seq" OWNED BY public."T_atleta_prueba".id_ap;


--
-- Name: T_dia_pdc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_dia_pdc" (
    id_dp integer NOT NULL,
    fecha timestamp without time zone,
    tecnica integer,
    tactica integer,
    fisico integer,
    velocidad integer,
    id_pdc integer,
    psicologico integer
);


ALTER TABLE public."T_dia_pdc" OWNER TO postgres;

--
-- Name: TABLE "T_dia_pdc"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_dia_pdc" IS 'Tabla con los datos POR DIA de las planificaciones';


--
-- Name: COLUMN "T_dia_pdc".id_dp; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".id_dp IS 'indice de la tabla: id por dia por programa';


--
-- Name: COLUMN "T_dia_pdc".fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".fecha IS 'fecha con el dia pautado para la planificacion';


--
-- Name: COLUMN "T_dia_pdc".tecnica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".tecnica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".tactica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".tactica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".fisico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".fisico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".velocidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".velocidad IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_dia_pdc".id_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".id_pdc IS 'clave foranea con ID o codigo del programa directo de competencia';


--
-- Name: COLUMN "T_dia_pdc".psicologico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_dia_pdc".psicologico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_tiempo_pdc_id_atp_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_tiempo_pdc_id_atp_seq" OWNER TO postgres;

--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_tiempo_pdc_id_atp_seq" OWNED BY public."T_dia_pdc".id_dp;


--
-- Name: T_atleta_uniforme; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_atleta_uniforme" (
    id_au integer NOT NULL,
    talla_franela character varying(20),
    talla_pantalon character varying(20),
    talla_short character varying(20),
    talla_gorra character varying(20),
    talla_chaqueta character varying(20),
    cedula_atleta character varying(255),
    talla_zapato integer
);


ALTER TABLE public."T_atleta_uniforme" OWNER TO postgres;

--
-- Name: TABLE "T_atleta_uniforme"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_atleta_uniforme" IS 'Tabla con los datos del uniforme del atleta';


--
-- Name: COLUMN "T_atleta_uniforme".id_au; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".id_au IS 'indice la tabla: id atleta uniforme';


--
-- Name: COLUMN "T_atleta_uniforme".talla_franela; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".talla_franela IS 'Talla de la franela';


--
-- Name: COLUMN "T_atleta_uniforme".talla_pantalon; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".talla_pantalon IS 'Talla del pantalon';


--
-- Name: COLUMN "T_atleta_uniforme".talla_short; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".talla_short IS 'Talla del Short o pantalon corto';


--
-- Name: COLUMN "T_atleta_uniforme".talla_gorra; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".talla_gorra IS 'Talla de la gorra';


--
-- Name: COLUMN "T_atleta_uniforme".talla_chaqueta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".talla_chaqueta IS 'Talla de la chaqueta';


--
-- Name: COLUMN "T_atleta_uniforme".cedula_atleta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_atleta_uniforme".cedula_atleta IS 'Clave foranea con la cedula del atleta';


--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_atleta_uniforme_id_au_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_atleta_uniforme_id_au_seq" OWNER TO postgres;

--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_atleta_uniforme_id_au_seq" OWNED BY public."T_atleta_uniforme".id_au;


--
-- Name: T_bitacora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_bitacora" (
    id_bitacora integer NOT NULL,
    id_usuarios integer,
    fecha date,
    hora time without time zone,
    actividad character varying(255)
);


ALTER TABLE public."T_bitacora" OWNER TO postgres;

--
-- Name: T_bitacora_id_bitacora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_bitacora_id_bitacora_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_bitacora_id_bitacora_seq" OWNER TO postgres;

--
-- Name: T_bitacora_id_bitacora_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_bitacora_id_bitacora_seq" OWNED BY public."T_bitacora".id_bitacora;


--
-- Name: T_disciplina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_disciplina" (
    id_disciplina integer NOT NULL,
    nombre character varying(255) NOT NULL,
    tipo_disciplina character varying(255),
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public."T_disciplina" OWNER TO postgres;

--
-- Name: TABLE "T_disciplina"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_disciplina" IS 'Tabla con los datos y la descripcion de las disciplinas';


--
-- Name: COLUMN "T_disciplina".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_disciplina".id_disciplina IS 'indice la tabla: id disciplina';


--
-- Name: COLUMN "T_disciplina".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_disciplina".nombre IS 'nombre de la disciplina';


--
-- Name: COLUMN "T_disciplina".tipo_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_disciplina".tipo_disciplina IS 'tipo o clasificacion de la disciplina: Registro y marca, Pelota, Combate, Mesa.';


--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_disciplina_id_disciplina_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_disciplina_id_disciplina_seq" OWNER TO postgres;

--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_disciplina_id_disciplina_seq" OWNED BY public."T_disciplina".id_disciplina;


--
-- Name: T_equipo_tecnico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_equipo_tecnico" (
    cedula_et character varying(255) NOT NULL,
    nombres character varying(255),
    apellidos character varying(255),
    cargo character varying(255),
    tel_movil character varying(255),
    correo character varying(255),
    dir_foto character varying(255),
    dir_cedula character varying(255),
    status integer DEFAULT 1
);


ALTER TABLE public."T_equipo_tecnico" OWNER TO postgres;

--
-- Name: TABLE "T_equipo_tecnico"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_equipo_tecnico" IS 'Tabla con los datos de los integrantes del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".cedula_et; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".cedula_et IS 'cedula del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".nombres; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".nombres IS 'nombres del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".apellidos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".apellidos IS 'apellidos del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".cargo IS 'cargo que desempeña el integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".tel_movil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".tel_movil IS 'telefono movil de contacto del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".correo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".correo IS 'correo electronico del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".dir_foto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".dir_foto IS 'direccion de la ubicacion de la foto del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".dir_cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".dir_cedula IS 'direccion de la ubicacion de la imagen de la cedula del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico".status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico".status IS 'estado: 1 para activo, 0 para inactivo';


--
-- Name: T_equipo_tecnico_disciplina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_equipo_tecnico_disciplina" (
    id_etd integer NOT NULL,
    cedula_et character varying(255),
    id_disciplina integer
);


ALTER TABLE public."T_equipo_tecnico_disciplina" OWNER TO postgres;

--
-- Name: TABLE "T_equipo_tecnico_disciplina"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_equipo_tecnico_disciplina" IS 'Tabla con los integrantes del integrante del equipo tecnico por disciplina en la que esta asignado';


--
-- Name: COLUMN "T_equipo_tecnico_disciplina".id_etd; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico_disciplina".id_etd IS 'indice de la tabla: id equipo tecnico por disciplina';


--
-- Name: COLUMN "T_equipo_tecnico_disciplina".cedula_et; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico_disciplina".cedula_et IS 'clave foranea con la cedula del integrante del equipo tecnico';


--
-- Name: COLUMN "T_equipo_tecnico_disciplina".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_equipo_tecnico_disciplina".id_disciplina IS 'clave foranea con el id de la disciplina';


--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_equipo_tecnico_disciplina_id_etd_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_equipo_tecnico_disciplina_id_etd_seq" OWNER TO postgres;

--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_equipo_tecnico_disciplina_id_etd_seq" OWNED BY public."T_equipo_tecnico_disciplina".id_etd;


--
-- Name: T_pdc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_pdc" (
    id_pdc integer NOT NULL,
    fecha_inicio timestamp without time zone,
    fecha_fin timestamp without time zone,
    tecnica integer,
    tactica integer,
    fisico integer,
    psicologico integer,
    velocidad integer,
    id_disciplina integer,
    tipo_pdc character varying(255),
    nombre_pdc character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL
);


ALTER TABLE public."T_pdc" OWNER TO postgres;

--
-- Name: TABLE "T_pdc"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_pdc" IS 'Tabla con los datos, descripcion y carracteristicas de los Programas directos de competencia (PDC).';


--
-- Name: COLUMN "T_pdc".id_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".id_pdc IS 'indice de la tabla: id o codigo del programa directo de competencia PDC';


--
-- Name: COLUMN "T_pdc".fecha_inicio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".fecha_inicio IS 'Fecha de inicio del programa';


--
-- Name: COLUMN "T_pdc".fecha_fin; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".fecha_fin IS 'Fecha de finalizacion del programa';


--
-- Name: COLUMN "T_pdc".tecnica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".tecnica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".tactica; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".tactica IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".fisico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".fisico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".psicologico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".psicologico IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".velocidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".velocidad IS 'carga en porcentaje para este aspecto del entrenamiento';


--
-- Name: COLUMN "T_pdc".id_disciplina; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".id_disciplina IS 'clave foranea con el ID o codigo de la disciplina a la que pertenece el entremanieto';


--
-- Name: COLUMN "T_pdc".tipo_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".tipo_pdc IS 'tipo de entrenamiento puede ser; PREPARATORIO, PRE-COMPETENCIA, COMPETITIVO, POST-COMPETENCIA';


--
-- Name: COLUMN "T_pdc".nombre_pdc; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".nombre_pdc IS 'Nombre del programa';


--
-- Name: COLUMN "T_pdc".descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pdc".descripcion IS 'Descripcion del PDC o programa directo de competencia';


--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_pdc_id_pdc_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_pdc_id_pdc_seq" OWNER TO postgres;

--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_pdc_id_pdc_seq" OWNED BY public."T_pdc".id_pdc;


--
-- Name: T_permisos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_permisos" (
    id_permisos integer NOT NULL,
    permisos character varying(255),
    id_usuario integer
);


ALTER TABLE public."T_permisos" OWNER TO postgres;

--
-- Name: TABLE "T_permisos"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_permisos" IS 'Tabla que almacena los permisos de los usuarios';


--
-- Name: T_permisos_id_permisos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_permisos_id_permisos_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_permisos_id_permisos_seq" OWNER TO postgres;

--
-- Name: T_permisos_id_permisos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_permisos_id_permisos_seq" OWNED BY public."T_permisos".id_permisos;


--
-- Name: T_pnf; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_pnf" (
    id_pnf integer NOT NULL,
    nombre character varying(255) NOT NULL,
    coordinador character varying(255) NOT NULL,
    status integer DEFAULT 1
);


ALTER TABLE public."T_pnf" OWNER TO postgres;

--
-- Name: TABLE "T_pnf"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_pnf" IS 'Tabla de Programas Nacionales de Formacion (PNF)';


--
-- Name: COLUMN "T_pnf".id_pnf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pnf".id_pnf IS 'indice de la tabla';


--
-- Name: COLUMN "T_pnf".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pnf".nombre IS 'Nombre del PNF';


--
-- Name: COLUMN "T_pnf".coordinador; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pnf".coordinador IS 'Primer nombre y Primer apellido del Coordinador del PNF';


--
-- Name: COLUMN "T_pnf".status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_pnf".status IS 'estado del pnf 1 para visible 0 para oculto';


--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_pnf_id_pnf_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_pnf_id_pnf_seq" OWNER TO postgres;

--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_pnf_id_pnf_seq" OWNED BY public."T_pnf".id_pnf;


--
-- Name: T_prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."T_prueba" (
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


ALTER TABLE public."T_prueba" OWNER TO postgres;

--
-- Name: TABLE "T_prueba"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."T_prueba" IS 'Tabla con la informacion y caracteristicas de los TEST o pruebas que realizaran los entrenadores a los atletas';


--
-- Name: COLUMN "T_prueba".id_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".id_prueba IS 'indice de la tabla: identificacion o codigo de la prueba';


--
-- Name: COLUMN "T_prueba".nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".nombre IS 'nombre de la prueba o TEST';


--
-- Name: COLUMN "T_prueba".descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".descripcion IS 'descripcion de la prueba o TEST, como debe ser ejecutado, indicaciones';


--
-- Name: COLUMN "T_prueba".tipo_prueba; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".tipo_prueba IS 'Capacidad fisica que emplea la prueba puede ser: VELOCIDAD, FUERZA, RESISTENCIA, FLEXIBILIDAD, EQUILIBRIO.';


--
-- Name: COLUMN "T_prueba".objetivo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".objetivo IS 'Breve descripcion del objetivo de la prueba: Ejemplo: Medir la fuerza-resistencia de los músculos lumbo-abdominales (test de abdominales superiores )';


--
-- Name: COLUMN "T_prueba".unidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".unidad IS 'unidad de medida de la prueba puede ser Centimetos, Metros, Kilometros, Segundos, Minutos.';


--
-- Name: COLUMN "T_prueba".rango1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".rango1 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".rango2 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".rango3 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".rango4; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".rango4 IS 'Rango de referencia para la unidad de medida';


--
-- Name: COLUMN "T_prueba".condicion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public."T_prueba".condicion IS 'determina la condicion para el calculo de la evaluacion de la prueba 0; valores menores. 1 ; para valores mayores';


--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."T_prueba_id_prueba_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."T_prueba_id_prueba_seq" OWNER TO postgres;

--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."T_prueba_id_prueba_seq" OWNED BY public."T_prueba".id_prueba;


--
-- Name: db_backup_autosave; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.db_backup_autosave (
    id_backup integer NOT NULL,
    backup_file character varying(255),
    backup_date timestamp without time zone,
    file_path character varying(255)
);


ALTER TABLE public.db_backup_autosave OWNER TO postgres;

--
-- Name: TABLE db_backup_autosave; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.db_backup_autosave IS 'Tabla para cron jobs de backups - tareas programadas';


--
-- Name: db_backup_autosave_id_backup_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.db_backup_autosave_id_backup_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.db_backup_autosave_id_backup_seq OWNER TO postgres;

--
-- Name: db_backup_autosave_id_backup_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.db_backup_autosave_id_backup_seq OWNED BY public.db_backup_autosave.id_backup;


--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rol (
    id_rol integer NOT NULL,
    rol character varying(32)
);


ALTER TABLE public.rol OWNER TO postgres;

--
-- Name: TABLE rol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.rol IS 'Tabla descripcion de roles';


--
-- Name: rol_id_rol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rol_id_rol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rol_id_rol_seq OWNER TO postgres;

--
-- Name: rol_id_rol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rol_id_rol_seq OWNED BY public.rol.id_rol;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_roles integer NOT NULL,
    id_rol integer,
    id_usuario integer
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: TABLE roles; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.roles IS 'tabla con roles por usuario';


--
-- Name: roles_id_roles_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_roles_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_roles_seq OWNER TO postgres;

--
-- Name: roles_id_roles_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_roles_seq OWNED BY public.roles.id_roles;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(25) NOT NULL,
    password character varying(255) NOT NULL,
    correo character varying(32),
    status integer DEFAULT 1 NOT NULL,
    cedula character varying(255),
    secret_key character varying(255),
    secret_img character varying(255),
    img_select character varying(255),
    bloqueo timestamp without time zone
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: TABLE usuarios; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.usuarios IS 'tabla de usuarios del sistema';


--
-- Name: COLUMN usuarios.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuarios.status IS 'Estado del usuario; 0 para inactivo 1 para activo';


--
-- Name: COLUMN usuarios.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuarios.cedula IS 'cedula del personal capacitado';


--
-- Name: COLUMN usuarios.secret_key; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuarios.secret_key IS 'Frase Secreta codificada';


--
-- Name: COLUMN usuarios.secret_img; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuarios.secret_img IS 'imagen secreta cifrada';


--
-- Name: COLUMN usuarios.img_select; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuarios.img_select IS 'imagen selecionada del patron para no repeticion';


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_usuario_seq OWNER TO postgres;

--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;


--
-- Name: T_atleta_academico id_aa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_academico" ALTER COLUMN id_aa SET DEFAULT nextval('public."T_atleta_academico_id_aa_seq"'::regclass);


--
-- Name: T_atleta_disciplina id_ad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_disciplina" ALTER COLUMN id_ad SET DEFAULT nextval('public."T_atleta_disciplina_id_ad_seq"'::regclass);


--
-- Name: T_atleta_ejecucion_pdc id_aep; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_ejecucion_pdc" ALTER COLUMN id_aep SET DEFAULT nextval('public."T_atleta_ejecucion_pdc_id_aep_seq"'::regclass);


--
-- Name: T_atleta_medico id_am; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_medico" ALTER COLUMN id_am SET DEFAULT nextval('public."T_atleta_medico_id_am_seq"'::regclass);


--
-- Name: T_atleta_prueba id_ap; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_prueba" ALTER COLUMN id_ap SET DEFAULT nextval('public."T_atleta_prueba_id_ap_seq"'::regclass);


--
-- Name: T_atleta_uniforme id_au; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_uniforme" ALTER COLUMN id_au SET DEFAULT nextval('public."T_atleta_uniforme_id_au_seq"'::regclass);


--
-- Name: T_bitacora id_bitacora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_bitacora" ALTER COLUMN id_bitacora SET DEFAULT nextval('public."T_bitacora_id_bitacora_seq"'::regclass);


--
-- Name: T_dia_pdc id_dp; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_dia_pdc" ALTER COLUMN id_dp SET DEFAULT nextval('public."T_atleta_tiempo_pdc_id_atp_seq"'::regclass);


--
-- Name: T_disciplina id_disciplina; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_disciplina" ALTER COLUMN id_disciplina SET DEFAULT nextval('public."T_disciplina_id_disciplina_seq"'::regclass);


--
-- Name: T_equipo_tecnico_disciplina id_etd; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_equipo_tecnico_disciplina" ALTER COLUMN id_etd SET DEFAULT nextval('public."T_equipo_tecnico_disciplina_id_etd_seq"'::regclass);


--
-- Name: T_pdc id_pdc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_pdc" ALTER COLUMN id_pdc SET DEFAULT nextval('public."T_pdc_id_pdc_seq"'::regclass);


--
-- Name: T_permisos id_permisos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_permisos" ALTER COLUMN id_permisos SET DEFAULT nextval('public."T_permisos_id_permisos_seq"'::regclass);


--
-- Name: T_pnf id_pnf; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_pnf" ALTER COLUMN id_pnf SET DEFAULT nextval('public."T_pnf_id_pnf_seq"'::regclass);


--
-- Name: db_backup_autosave id_backup; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.db_backup_autosave ALTER COLUMN id_backup SET DEFAULT nextval('public.db_backup_autosave_id_backup_seq'::regclass);


--
-- Name: rol id_rol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol ALTER COLUMN id_rol SET DEFAULT nextval('public.rol_id_rol_seq'::regclass);


--
-- Name: roles id_roles; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id_roles SET DEFAULT nextval('public.roles_id_roles_seq'::regclass);


--
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: T_atleta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta" (cedula_atleta, nombres, apellidos, fecha_nacimiento, direccion, tel_movil, tel_fijo, correo, sexo, dir_foto, dir_cedula, status) FROM stdin;
2	Segundoa	DOS	2018-03-01	casa	2	2	ddos@gmail.com	masculino	assets/img/img_foto_atleta/2VirtualBox_2018-03-06_20-28-29.png	assets/img/img_ced_atleta/2firefox_2018-03-24_12-03-48.png	1
20350027	Alvaro Sofi	Tirado Gil	1992-04-20	Carrera 13 esq. Calle 18	04164645556		alvarot027@gmail.com	masculino	assets/img/img_foto_atleta/203500272017-08-27-1310.jpg	assets/img/img_ced_atleta/20350027referencia compra de legion para homer de robert.jpg	1
23654987	Juan Andres	Campos Rojas	2000-03-15	Av. 2 con calles 8 y 9	04169874532	02514459632	camposjuan@gmail.com	masculino	assets/img/img_foto_atleta/23654987ApplicationFrameHost_2016-09-12_15-42-49.png	assets/img/img_ced_atleta/23654987ponencia virtual.png	1
\.


--
-- Data for Name: T_atleta_academico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta_academico" (id_aa, trayecto, "año_ingreso", dir_planilla, dir_carnet, cedula_atleta, id_pnf) FROM stdin;
17	3	2010	assets/img/img_planilla_atleta/2firefox_2018-03-18_01-53-16.png	assets/img/img_carnet_atleta/2firefox_2018-03-18_01-53-16.png	2	2
16	3	2015	assets/img/img_planilla_atleta/20350027VirtualBox_2018-03-06_20-28-29.png	assets/img/img_carnet_atleta/20350027firefox_2018-03-18_01-53-16.png	20350027	7
21	3	2010	assets/img/img_planilla_atleta/23654987referencia compra de legion para homer de robert.jpg	assets/img/img_carnet_atleta/23654987AcroRd32_2018-02-15_21-08-35.png	23654987	4
\.


--
-- Data for Name: T_atleta_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta_disciplina" (id_ad, cedula_atleta, id_disciplina) FROM stdin;
90	2	16
91	2	18
95	20350027	16
96	20350027	18
\.


--
-- Data for Name: T_atleta_ejecucion_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta_ejecucion_pdc" (id_aep, fecha_ejecucion, resultado, cedula_atleta, id_dp) FROM stdin;
45	\N	\N	2	486
46	\N	\N	20350027	486
47	\N	\N	2	487
48	\N	\N	20350027	487
49	\N	\N	2	488
50	\N	\N	20350027	488
51	\N	\N	2	489
52	\N	\N	20350027	489
53	\N	\N	2	490
54	\N	\N	20350027	490
55	\N	\N	2	491
56	\N	\N	20350027	491
57	\N	\N	2	492
58	\N	\N	20350027	492
59	\N	\N	2	493
60	\N	\N	20350027	493
61	\N	\N	2	494
62	\N	\N	20350027	494
63	\N	\N	2	495
64	\N	\N	20350027	495
65	\N	\N	2	496
66	\N	\N	20350027	496
67	\N	\N	2	497
68	\N	\N	20350027	497
69	\N	\N	2	498
70	\N	\N	20350027	498
71	\N	\N	2	499
72	\N	\N	20350027	499
73	\N	\N	2	500
74	\N	\N	20350027	500
75	\N	\N	2	501
76	\N	\N	20350027	501
77	\N	\N	2	502
78	\N	\N	20350027	502
79	\N	\N	2	503
80	\N	\N	20350027	503
81	\N	\N	2	504
82	\N	\N	20350027	504
83	\N	\N	2	505
84	\N	\N	20350027	505
85	\N	\N	2	506
86	\N	\N	20350027	506
87	\N	\N	2	507
88	\N	\N	20350027	507
89	\N	\N	2	508
90	\N	\N	20350027	508
91	\N	\N	2	509
92	\N	\N	20350027	509
93	\N	\N	2	510
94	\N	\N	20350027	510
95	\N	\N	2	511
96	\N	\N	20350027	511
97	\N	\N	2	512
98	\N	\N	20350027	512
99	\N	\N	2	513
100	\N	\N	20350027	513
101	\N	\N	2	514
102	\N	\N	20350027	514
103	\N	\N	2	515
104	\N	\N	20350027	515
105	\N	\N	2	516
106	\N	\N	20350027	516
107	\N	\N	2	517
108	\N	\N	20350027	517
109	\N	\N	20350027	518
110	\N	\N	20350027	519
111	\N	\N	20350027	520
112	\N	\N	20350027	521
113	\N	\N	20350027	522
114	\N	\N	20350027	523
115	\N	\N	20350027	524
116	\N	\N	20350027	525
117	\N	\N	20350027	526
118	\N	\N	20350027	527
119	\N	\N	20350027	528
120	\N	\N	20350027	529
121	\N	\N	20350027	530
122	\N	\N	20350027	531
123	\N	\N	20350027	532
124	\N	\N	20350027	533
125	\N	\N	20350027	534
126	\N	\N	20350027	535
127	\N	\N	20350027	536
128	\N	\N	20350027	537
129	\N	\N	20350027	538
\.


--
-- Data for Name: T_atleta_medico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta_medico" (id_am, estatura, peso, tipo_sangre, contacto_emergencia, tel_contacto, info_discapacidad, observaciones, cedula_atleta, info_alergias) FROM stdin;
13	1.73000002	60		d	2		alergico a	2	asd
12	1.72000003	60		Maria gil	02512370787			20350027	
17	1.79999995	60.5	O+	Madre Ninfa Campos	04163214578			23654987	
\.


--
-- Data for Name: T_atleta_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta_prueba" (id_ap, fecha, medicion, cedula_atleta, id_prueba) FROM stdin;
3	2018-05-16	12	20350027	EquLibtest
4	2018-05-04	15	20350027	EquLibtest
5	2018-05-04	50	20350027	EquLibtest
6	2018-05-17	50	20350027	EquLibtest
7	2018-05-17	50	20350027	EquLibtest
8	2018-05-17	50	20350027	EquLibtest
9	2018-05-17	50	20350027	EquLibtest
10	2018-05-17	50	20350027	EquLibtest
11	2018-05-17	50	20350027	EquLibtest
12	2018-05-17	50	20350027	EquLibtest
13	2018-05-17	50	20350027	EquLibtest
14	2018-05-17	50	20350027	EquLibtest
15	2018-05-30	45	20350027	EquLibtest
16	2018-05-30	45	20350027	EquLibtest
17	2018-05-30	45	20350027	EquLibtest
18	2018-05-24	40	20350027	EquLibtest
19	2018-05-24	40	20350027	EquLibtest
20	2018-05-16	50	20350027	EquLibtest
21	2018-05-16	50	20350027	EquLibtest
22	2018-05-16	50	20350027	EquLibtest
23	2018-05-16	50	20350027	EquLibtest
24	2018-05-18	60	2	EquLibtest
25	2018-05-24	50	2	EquLibtest
26	2018-05-11	40	2	EquLibtest
27	2018-05-25	70	2	EquLibtest
28	2019-06-29	22	2	EquLibtest
\.


--
-- Data for Name: T_atleta_uniforme; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_atleta_uniforme" (id_au, talla_franela, talla_pantalon, talla_short, talla_gorra, talla_chaqueta, cedula_atleta, talla_zapato) FROM stdin;
12	XS	XS	XS	XL	XXL	2	41
11	S	M	S	S	M	20350027	41
16						23654987	45
\.


--
-- Data for Name: T_bitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_bitacora" (id_bitacora, id_usuarios, fecha, hora, actividad) FROM stdin;
27	13	2019-06-29	17:19:39	Exporto la Base de datos .BACKUP
28	13	2019-07-06	22:02:27	Realizo una restauracion de Base de datos
29	13	2019-07-06	11:26:58	registro un pnf
30	13	2019-07-08	10:25:40	registro un Usuario
31	13	2019-07-08	11:02:42	Elimino un Atleta
32	13	2019-07-08	11:04:32	Elimino un Atleta
33	13	2019-07-08	11:05:53	Elimino un Atleta
34	13	2019-07-08	11:06:03	Elimino un Atleta
35	13	2019-07-08	11:06:26	Elimino un Atleta
36	13	2019-07-08	11:06:28	Elimino un Atleta
37	13	2019-07-08	11:08:57	modifico un usuario
38	17	2019-07-08	12:21:49	Recupero su contraseña
39	13	2019-07-08	13:39:24	Exporto la Base de datos .BACKUP
40	13	2019-07-08	23:50:56	Realizo una restauracion de Base de datos
41	13	2019-07-09	11:08:47	registro un Usuario
42	13	2019-07-09	11:12:56	registro un Usuario
43	22	2019-07-09	11:24:33	Modifico un Pnf
44	22	2019-07-09	11:25:18	Modifico un Pnf
45	22	2019-07-09	11:30:39	Exporto la Base de datos .BACKUP
46	22	2019-07-09	11:33:43	Realizo una restauracion de Base de datos
47	13	2019-07-09	13:25:54	Exporto la Base de datos .BACKUP
48	13	2019-07-14	23:19:48	Exporto la Base de datos .BACKUP
49	13	2019-07-14	23:28:32	Exporto la Base de datos .BACKUP
50	13	2019-07-14	23:30:27	Exporto la Base de datos .BACKUP
51	13	2019-07-16	23:51:49	Exporto la Base de datos .BACKUP
52	13	2019-07-16	23:58:37	Exporto la Base de datos .SQL
\.


--
-- Data for Name: T_dia_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_dia_pdc" (id_dp, fecha, tecnica, tactica, fisico, velocidad, id_pdc, psicologico) FROM stdin;
486	2018-05-28 01:28:00	1	0	1	1	22	0
487	2018-05-29 06:00:00	1	1	0	1	22	1
488	2018-05-30 06:00:00	0	0	1	0	22	0
489	2018-05-31 06:00:00	0	0	1	1	22	0
490	2018-06-01 06:00:00	0	1	0	1	22	0
491	2018-06-02 06:00:00	1	1	1	1	22	1
492	2018-06-03 06:00:00	1	1	1	1	22	1
493	2018-06-04 06:00:00	1	1	1	1	22	1
494	2018-06-05 06:00:00	1	1	0	1	22	0
495	2018-06-06 06:00:00	1	1	1	1	22	1
496	2018-06-07 06:00:00	1	1	1	1	22	1
497	2018-06-08 06:00:00	0	0	1	1	22	0
498	2018-06-09 06:00:00	1	1	0	0	22	0
499	2018-06-10 06:00:00	0	0	1	0	22	0
500	2018-06-11 06:00:00	1	1	0	1	22	1
501	2018-06-12 06:00:00	1	1	1	1	22	1
502	2018-06-13 06:00:00	1	0	1	1	22	0
503	2018-06-14 06:00:00	0	0	1	1	22	0
504	2018-06-15 06:00:00	1	1	0	1	22	1
505	2018-06-16 06:00:00	1	0	0	0	22	1
506	2018-06-17 06:00:00	1	1	1	1	22	1
510	2018-06-21 06:00:00	1	1	1	1	22	1
507	2018-06-18 06:00:00	1	1	1	1	22	1
508	2018-06-19 06:00:00	1	1	1	1	22	1
509	2018-06-20 06:00:00	0	1	1	1	22	0
511	2018-06-22 06:00:00	1	1	1	1	22	1
512	2018-06-23 06:00:00	1	1	1	1	22	1
514	2018-06-25 06:00:00	1	1	1	1	22	1
513	2018-06-24 06:00:00	0	1	1	1	22	0
515	2018-06-26 06:00:00	0	1	1	1	22	0
516	2018-06-27 06:00:00	0	1	1	1	22	0
517	2018-06-28 06:00:00	0	1	0	1	22	1
518	2018-04-02 00:00:00	\N	\N	\N	\N	18	\N
519	2018-04-03 06:00:00	\N	\N	\N	\N	18	\N
520	2018-04-04 06:00:00	\N	\N	\N	\N	18	\N
521	2018-04-05 06:00:00	\N	\N	\N	\N	18	\N
522	2018-04-06 06:00:00	\N	\N	\N	\N	18	\N
523	2018-04-07 06:00:00	\N	\N	\N	\N	18	\N
524	2018-04-08 06:00:00	\N	\N	\N	\N	18	\N
525	2018-04-09 06:00:00	\N	\N	\N	\N	18	\N
526	2018-04-10 06:00:00	\N	\N	\N	\N	18	\N
527	2018-04-11 06:00:00	\N	\N	\N	\N	18	\N
528	2018-04-12 06:00:00	\N	\N	\N	\N	18	\N
529	2018-04-13 06:00:00	\N	\N	\N	\N	18	\N
530	2018-04-14 06:00:00	\N	\N	\N	\N	18	\N
531	2018-04-15 06:00:00	\N	\N	\N	\N	18	\N
532	2018-04-16 06:00:00	\N	\N	\N	\N	18	\N
533	2018-04-17 06:00:00	\N	\N	\N	\N	18	\N
534	2018-04-18 06:00:00	\N	\N	\N	\N	18	\N
535	2018-04-19 06:00:00	\N	\N	\N	\N	18	\N
536	2018-04-20 06:00:00	\N	\N	\N	\N	18	\N
537	2018-04-21 06:00:00	\N	\N	\N	\N	18	\N
538	2018-04-22 06:00:00	\N	\N	\N	\N	18	\N
539	2018-07-02 06:00:00	\N	\N	\N	\N	21	\N
540	2018-07-03 06:00:00	\N	\N	\N	\N	21	\N
541	2018-07-04 06:00:00	\N	\N	\N	\N	21	\N
542	2018-07-05 06:00:00	\N	\N	\N	\N	21	\N
543	2018-07-06 06:00:00	\N	\N	\N	\N	21	\N
544	2018-07-07 06:00:00	\N	\N	\N	\N	21	\N
545	2018-07-08 06:00:00	\N	\N	\N	\N	21	\N
546	2018-07-09 06:00:00	\N	\N	\N	\N	21	\N
547	2018-07-10 06:00:00	\N	\N	\N	\N	21	\N
548	2018-07-11 06:00:00	\N	\N	\N	\N	21	\N
549	2018-07-12 06:00:00	\N	\N	\N	\N	21	\N
550	2018-07-13 06:00:00	\N	\N	\N	\N	21	\N
551	2018-07-14 06:00:00	\N	\N	\N	\N	21	\N
552	2018-07-15 06:00:00	\N	\N	\N	\N	21	\N
553	2018-07-16 06:00:00	\N	\N	\N	\N	21	\N
554	2018-07-17 06:00:00	\N	\N	\N	\N	21	\N
555	2018-07-18 06:00:00	\N	\N	\N	\N	21	\N
556	2018-07-19 06:00:00	\N	\N	\N	\N	21	\N
557	2018-07-20 06:00:00	\N	\N	\N	\N	21	\N
558	2018-07-21 06:00:00	\N	\N	\N	\N	21	\N
559	2018-07-22 06:00:00	\N	\N	\N	\N	21	\N
560	2018-07-23 06:00:00	\N	\N	\N	\N	21	\N
\.


--
-- Data for Name: T_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_disciplina" (id_disciplina, nombre, tipo_disciplina, status) FROM stdin;
16	Ajedrez Masculino	Mesa	1
17	Ajedrez Femenino	Mesa	1
18	Atletismo Masculino	Registro y Marca	1
19	Atletismo Femenino	Registro y Marca	1
23	Ciclismo Masculino	Registro y Marca	1
24	Ciclismo Femenino	Registro y Marca	1
25	Esgrima Masculino	Combate	1
26	Esgrima Femenino	Combate	1
31	Judo Masculino	Combate	1
32	Judo Femenino	Combate	1
33	Karate Do Masculino	Combate	1
34	Karate Do Femenino	Combate	1
36	Levantamiento de Pesas Masculino	Registro y Marca	1
37	Levantamiento de Pesas Femenino	Registro y Marca	1
38	Lucha Olimpica Masculino	Combate	1
39	Lucha Olimpica Femenino	Combate	1
40	Natación Masculino	Registro y Marca	1
41	Natación Femenino	Registro y Marca	1
44	Taekwondo Masculino	Combate	1
45	Taekwondo Femenino	Combate	1
48	Tenis de Mesa Masculino	Mesa	1
49	Tenis de Mesa Femenino	Mesa	1
50	Voleibol de Arena Masculino	Pelota	1
51	Voleibol Arena Femenino	Pelota	1
52	Voleibol Masculino	Pelota	1
53	Voleibol Femenino	Pelota	1
20	Baloncesto Masculino	Pelota	1
21	Baloncesto Femenino	Pelota	1
22	Béisbol	Pelota	1
27	Fútbol Masculino	Pelota	1
28	Fútbol Femenino	Pelota	1
29	Fútbol Sala Masculino	Pelota	1
30	Fútbol Sala Femenino	Pelota	1
35	Kickingball	Pelota	1
42	Sóftbol Masculino	Pelota	1
43	Sóftbol Femenino	Pelota	1
46	Tenis Masculino	Pelota	1
47	Tenis Femenino	Pelota	1
\.


--
-- Data for Name: T_equipo_tecnico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_equipo_tecnico" (cedula_et, nombres, apellidos, cargo, tel_movil, correo, dir_foto, dir_cedula, status) FROM stdin;
19263736	Osmin Elieser	Principal Gonzalez	entrenador	55555555555	ada@gmail.com	assets/img/img_foto_personal/19263736casos de uso del sistema.png	assets/img/img_ced_personal/19263736casos de uso del sistema.png	1
\.


--
-- Data for Name: T_equipo_tecnico_disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_equipo_tecnico_disciplina" (id_etd, cedula_et, id_disciplina) FROM stdin;
9	19263736	19
10	19263736	23
\.


--
-- Data for Name: T_pdc; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_pdc" (id_pdc, fecha_inicio, fecha_fin, tecnica, tactica, fisico, psicologico, velocidad, id_disciplina, tipo_pdc, nombre_pdc, descripcion) FROM stdin;
18	2018-04-02 00:00:00	2018-04-23 00:01:00	20	20	20	20	20	18	Pre-Compentencia	evento modificado 2	prueba de registro modificado 1
19	2018-12-03 23:35:00	2018-12-24 23:36:00	20	20	20	20	20	40	Pre-Compentencia	Planificacion	adasdsadsad
20	2018-11-05 23:40:00	2018-11-26 23:41:00	20	20	20	20	20	39	Preparatorio	Planificacion 1	asdad
22	2018-05-28 01:28:00	2018-06-29 01:29:00	20	20	20	20	20	18	Preparatorio	evento de carlangas 12345	aqui ya son las 1 y media de la mañana programando
17	2018-04-16 17:39:00	2018-05-07 17:40:00	20	20	20	20	20	16	Competitivo	Prueba 1 de Planificación	aqui desc
21	2018-07-02 06:00:00	2018-07-23 22:00:00	20	20	19	20	21	40	Preparatorio	evento 5	adsads
\.


--
-- Data for Name: T_permisos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_permisos" (id_permisos, permisos, id_usuario) FROM stdin;
1	Registrar atleta	2
2	Registrar personal capacitado	25
3	Modificar Personal Capacitado	25
4	Modificar Atleta	25
5	Modificar Personal Capacitado	21
6	Eliminar Personal Capacitado	21
7	Modificar Atleta	21
8	Modificar Personal Capacitado	\N
9	Eliminar Personal Capacitado	\N
10	Modificar Atleta	\N
11	Registrar personal capacitado	16
12	Modificar Personal Capacitado	16
13	Eliminar Personal Capacitado	16
14	Registrar Atleta	16
15	Modificar Atleta	16
16	Eliminar Atleta	16
17	Registrar Atleta	18
18	Registrar Atleta	19
\.


--
-- Data for Name: T_pnf; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_pnf" (id_pnf, nombre, coordinador, status) FROM stdin;
3	PNF en Contaduría Publica	coordinador	1
4	PNF en Turismo	coordinador	1
5	PNF en Agroalimentación	coordinador	1
6	PNF en Higiene y seguridad laboral	coordinador	1
8	PNF en Sistemas de calidad y ambiente	coordinador	1
2	PNF en Ciencias  de la Información	coordinador	1
9	PNF en Administracion	coordinador	1
7	PNF en Informática	Leany 	1
1	PNF en Entrenamiento Deportivo	Walter Rodriguez	1
\.


--
-- Data for Name: T_prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."T_prueba" (id_prueba, nombre, descripcion, tipo_prueba, objetivo, unidad, rango1, rango2, rango3, rango4, status, condicion) FROM stdin;
EquLibtest	test	\nvjklm	Equilibrio	gujyhuji	Libras	30	60	90	120	1	1
\.


--
-- Data for Name: db_backup_autosave; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.db_backup_autosave (id_backup, backup_file, backup_date, file_path) FROM stdin;
10	db-backup-autosave2019-06-26_06-10-49.backup	2019-06-26 06:10:49	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-06-26_06-10-49.backup
11	db-backup-autosave2019-07-09_13-42-55.backup	2019-07-09 13:42:55	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-09_13-42-55.backup
12	db-backup-autosave2019-07-10_13-42-56.backup	2019-07-10 13:42:56	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-10_13-42-56.backup
13	db-backup-autosave2019-07-11_13-42-58.backup	2019-07-11 13:42:58	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-11_13-42-58.backup
14	db-backup-autosave2019-07-12_13-42-53.backup	2019-07-12 13:42:53	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-12_13-42-53.backup
15	db-backup-autosave2019-07-13_13-43-02.backup	2019-07-13 13:43:02	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-13_13-43-02.backup
16	db-backup-autosave2019-07-14_13-42-55.backup	2019-07-14 13:42:55	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-14_13-42-55.backup
17	db-backup-autosave2019-07-15_13-42-55.backup	2019-07-15 13:42:55	E:\\laragon\\www\\DIRDEUPTAEB\\db_autosave\\db-backup-autosave2019-07-15_13-42-55.backup
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rol (id_rol, rol) FROM stdin;
1	Administrador
2	Usuario
3	Entrenador
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id_roles, id_rol, id_usuario) FROM stdin;
3	1	4
12	1	13
2	1	2
13	1	14
20	2	21
7	1	\N
8	1	\N
9	1	\N
15	1	\N
16	1	\N
17	1	15
18	2	16
19	1	17
21	3	19
22	1	20
23	1	\N
24	1	22
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id_usuario, nombre_usuario, password, correo, status, cedula, secret_key, secret_img, img_select, bloqueo) FROM stdin;
4	Osmin	$2y$10$uaPjldZeqaQntNfKPc4ZA.dptrK7t7FpA8MrHLBX/sIfGN/EK55c.	osminprincipal@gmail.com	1	\N	\N	\N	\N	\N
2	deb	$2y$10$rRGEu8ut0Sm6vGPLuDa04eQB6wgXO.D67p.GMV02f/2NP7vFvqVdG	deb@gmail.com	0	\N	\N	\N	\N	\N
14	wifi	$2y$10$Usu/CkfZ0alsl2VOdJx7iOcWNjPd1NiTKuTGbZoNH1ZRKbm2Tes0i	asdsad@hotmail.com	1	\N	\N	\N	\N	\N
21	pruebas	$2y$10$pIil43i0vJDJsrCgcB3JkObgC1iOWjh5jO1H5V/R7xoIPkPTineri	wister@gmail.com	1		\N	\N	\N	\N
16	isliany	$2y$10$t06y6yKWK6Gpnyo02vUa.OHepa0wGJeI/KzjzFIWdSerp7Etz4Yeu	islianydiaz123@hotmail.es	1		U295IGxhIE1lam9y	YXNzZXRzL2ltZy9lc3RlZ2FuL3VzZXJpbWcvMmVjYjhlNjIzYw==	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0MQ==	\N
18	Alvaro	$2y$10$ikBZytivUge5h.U/9SbFP.ocjc1TJ7t4FzcAfyR2xZqG1Tndsj39e	alvarot@gm	1		NDRjZWFiOTllNQ==	\N	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0NA==	\N
19	maria	$2y$10$0IO/kKdykM8mPa011R8DFOaGXHKu1meKn8ekbdeIiqhkRO5dGBgA6	maria@asdsa	1		YzFiMjM0ZTc2Yw==	\N	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0NA==	\N
20	tanias	$2y$10$wOF.W8cw.Owa4neKRl4XZOb2UQJabIYozk/1Ze3iYWP2jrzzMCX7y	tanias@gmail.com	1		YmRiNWY3NmVlZg==	\N	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0MTU=	\N
15	c	$2y$10$stu1BNQfRlkORztEN13bKesP91NABvvIu9cX.8vi37z49GSLv4Vzi	c@gma	5		RXN0ZSBlcyBlbCBzZWNyZXRvIG1hcyBndWFyZGFkbyBkZWwgdW5pdmVyc28=	YXNzZXRzL2ltZy9lc3RlZ2FuL3VzZXJpbWcvNWJiY2YwZTU1YQ==	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0MTE=	2019-07-08 16:20:21
17	b	$2y$10$qBCqwPQMJaBUY/yGK6mdfu6H6R4MPus.athOWfvdRz/dg9AjNpinq	b@gmail.com	1		M2NhMzM5OWI1MA==	\N	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0Ng==	2019-07-08 16:14:22
13	a	$2y$10$LYOx5fevRGcdrCjuYIVgsu1px4UK9Af2Hg35ZByiBB3Qvw8vvEJwW	a@g.com	1	\N	SG9sYSBzb3kgZWwgc2VjcmV0bw==	YXNzZXRzL2ltZy9lc3RlZ2FuL3VzZXJpbWcvb3V0cHV0dXNlcmltZzE=	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0Nw==	2019-07-08 16:14:55
22	yeraldin365	$2y$10$GbKji2QtucB67a4pQof48.jSp.gBphx7U8SNU0WehQnsc5uA./3ii	yeraldinmorillo1985@gmail.com	1		NzRlNWU3YTRjYw==	\N	YXNzZXRzL2ltZy9lc3RlZ2FuL2ltZy90ZXN0MTU=	\N
\.


--
-- Name: T_atleta_academico_id_aa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_academico_id_aa_seq"', 21, true);


--
-- Name: T_atleta_cedula_atleta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_cedula_atleta_seq"', 1, false);


--
-- Name: T_atleta_disciplina_id_ad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_disciplina_id_ad_seq"', 97, true);


--
-- Name: T_atleta_ejecucion_pdc_id_aep_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_ejecucion_pdc_id_aep_seq"', 129, true);


--
-- Name: T_atleta_medico_id_am_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_medico_id_am_seq"', 17, true);


--
-- Name: T_atleta_prueba_id_ap_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_prueba_id_ap_seq"', 28, true);


--
-- Name: T_atleta_tiempo_pdc_id_atp_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_tiempo_pdc_id_atp_seq"', 560, true);


--
-- Name: T_atleta_uniforme_id_au_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_atleta_uniforme_id_au_seq"', 16, true);


--
-- Name: T_bitacora_id_bitacora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_bitacora_id_bitacora_seq"', 52, true);


--
-- Name: T_disciplina_id_disciplina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_disciplina_id_disciplina_seq"', 56, true);


--
-- Name: T_equipo_tecnico_disciplina_id_etd_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_equipo_tecnico_disciplina_id_etd_seq"', 12, true);


--
-- Name: T_pdc_id_pdc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_pdc_id_pdc_seq"', 22, true);


--
-- Name: T_permisos_id_permisos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_permisos_id_permisos_seq"', 18, true);


--
-- Name: T_pnf_id_pnf_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_pnf_id_pnf_seq"', 14, true);


--
-- Name: T_prueba_id_prueba_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."T_prueba_id_prueba_seq"', 2, true);


--
-- Name: db_backup_autosave_id_backup_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.db_backup_autosave_id_backup_seq', 17, true);


--
-- Name: rol_id_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rol_id_rol_seq', 3, true);


--
-- Name: roles_id_roles_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_roles_seq', 24, true);


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 22, true);


--
-- Name: T_atleta_academico T_atleta_academico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_academico"
    ADD CONSTRAINT "T_atleta_academico_pkey" PRIMARY KEY (id_aa);


--
-- Name: T_atleta_disciplina T_atleta_disciplina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_disciplina"
    ADD CONSTRAINT "T_atleta_disciplina_pkey" PRIMARY KEY (id_ad);


--
-- Name: T_atleta_ejecucion_pdc T_atleta_ejecucion_pdc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_ejecucion_pdc"
    ADD CONSTRAINT "T_atleta_ejecucion_pdc_pkey" PRIMARY KEY (id_aep);


--
-- Name: T_atleta_medico T_atleta_medico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_medico"
    ADD CONSTRAINT "T_atleta_medico_pkey" PRIMARY KEY (id_am);


--
-- Name: T_atleta T_atleta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta"
    ADD CONSTRAINT "T_atleta_pkey" PRIMARY KEY (cedula_atleta);


--
-- Name: T_atleta_prueba T_atleta_prueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_prueba"
    ADD CONSTRAINT "T_atleta_prueba_pkey" PRIMARY KEY (id_ap);


--
-- Name: T_dia_pdc T_atleta_tiempo_pdc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_dia_pdc"
    ADD CONSTRAINT "T_atleta_tiempo_pdc_pkey" PRIMARY KEY (id_dp);


--
-- Name: T_atleta_uniforme T_atleta_uniforme_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_uniforme"
    ADD CONSTRAINT "T_atleta_uniforme_pkey" PRIMARY KEY (id_au);


--
-- Name: T_bitacora T_bitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_bitacora"
    ADD CONSTRAINT "T_bitacora_pkey" PRIMARY KEY (id_bitacora);


--
-- Name: T_disciplina T_disciplina_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_disciplina"
    ADD CONSTRAINT "T_disciplina_nombre_key" UNIQUE (nombre);


--
-- Name: T_disciplina T_disciplina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_disciplina"
    ADD CONSTRAINT "T_disciplina_pkey" PRIMARY KEY (id_disciplina);


--
-- Name: T_equipo_tecnico_disciplina T_equipo_tecnico_disciplina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_equipo_tecnico_disciplina"
    ADD CONSTRAINT "T_equipo_tecnico_disciplina_pkey" PRIMARY KEY (id_etd);


--
-- Name: T_equipo_tecnico T_equipo_tecnico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_equipo_tecnico"
    ADD CONSTRAINT "T_equipo_tecnico_pkey" PRIMARY KEY (cedula_et);


--
-- Name: T_pdc T_pdc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_pdc"
    ADD CONSTRAINT "T_pdc_pkey" PRIMARY KEY (id_pdc);


--
-- Name: T_permisos T_permisos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_permisos"
    ADD CONSTRAINT "T_permisos_pkey" PRIMARY KEY (id_permisos);


--
-- Name: T_pnf T_pnf_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_pnf"
    ADD CONSTRAINT "T_pnf_pkey" PRIMARY KEY (id_pnf);


--
-- Name: T_prueba T_prueba_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_prueba"
    ADD CONSTRAINT "T_prueba_pkey" PRIMARY KEY (id_prueba);


--
-- Name: db_backup_autosave db_backup_autosave_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.db_backup_autosave
    ADD CONSTRAINT db_backup_autosave_pkey PRIMARY KEY (id_backup);


--
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (id_rol);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_roles);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- Name: roles FK_ID_ROL; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT "FK_ID_ROL" FOREIGN KEY (id_rol) REFERENCES public.rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: roles FK_ID_USER; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT "FK_ID_USER" FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_academico T_atleta_academico_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_academico"
    ADD CONSTRAINT "T_atleta_academico_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES public."T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_academico T_atleta_academico_id_pnf_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_academico"
    ADD CONSTRAINT "T_atleta_academico_id_pnf_fkey" FOREIGN KEY (id_pnf) REFERENCES public."T_pnf"(id_pnf) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_disciplina T_atleta_disciplina_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_disciplina"
    ADD CONSTRAINT "T_atleta_disciplina_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES public."T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_disciplina T_atleta_disciplina_id_disciplina_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_disciplina"
    ADD CONSTRAINT "T_atleta_disciplina_id_disciplina_fkey" FOREIGN KEY (id_disciplina) REFERENCES public."T_disciplina"(id_disciplina) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_ejecucion_pdc T_atleta_ejecucion_pdc_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_ejecucion_pdc"
    ADD CONSTRAINT "T_atleta_ejecucion_pdc_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES public."T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_ejecucion_pdc T_atleta_ejecucion_pdc_id_dp_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_ejecucion_pdc"
    ADD CONSTRAINT "T_atleta_ejecucion_pdc_id_dp_fkey" FOREIGN KEY (id_dp) REFERENCES public."T_dia_pdc"(id_dp) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_medico T_atleta_medico_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_medico"
    ADD CONSTRAINT "T_atleta_medico_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES public."T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_prueba T_atleta_prueba_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_prueba"
    ADD CONSTRAINT "T_atleta_prueba_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES public."T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_prueba T_atleta_prueba_id_prueba_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_prueba"
    ADD CONSTRAINT "T_atleta_prueba_id_prueba_fkey" FOREIGN KEY (id_prueba) REFERENCES public."T_prueba"(id_prueba) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_atleta_uniforme T_atleta_uniforme_cedula_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_atleta_uniforme"
    ADD CONSTRAINT "T_atleta_uniforme_cedula_atleta_fkey" FOREIGN KEY (cedula_atleta) REFERENCES public."T_atleta"(cedula_atleta) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_bitacora T_bitacora_usuario_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_bitacora"
    ADD CONSTRAINT "T_bitacora_usuario_fk" FOREIGN KEY (id_usuarios) REFERENCES public.usuarios(id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: T_dia_pdc T_dia_pdc_id_pdc_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_dia_pdc"
    ADD CONSTRAINT "T_dia_pdc_id_pdc_fkey" FOREIGN KEY (id_pdc) REFERENCES public."T_pdc"(id_pdc) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_equipo_tecnico_disciplina T_equipo_tecnico_disciplina_cedula_et_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_equipo_tecnico_disciplina"
    ADD CONSTRAINT "T_equipo_tecnico_disciplina_cedula_et_fkey" FOREIGN KEY (cedula_et) REFERENCES public."T_equipo_tecnico"(cedula_et) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_equipo_tecnico_disciplina T_equipo_tecnico_disciplina_id_disciplina_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_equipo_tecnico_disciplina"
    ADD CONSTRAINT "T_equipo_tecnico_disciplina_id_disciplina_fkey" FOREIGN KEY (id_disciplina) REFERENCES public."T_disciplina"(id_disciplina) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: T_pdc T_pdc_id_disciplina_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."T_pdc"
    ADD CONSTRAINT "T_pdc_id_disciplina_fkey" FOREIGN KEY (id_disciplina) REFERENCES public."T_disciplina"(id_disciplina) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

