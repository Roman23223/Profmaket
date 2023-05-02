import {fetchHydra, HydraAdmin, hydraDataProvider} from "@api-platform/admin";
import {Resource} from "react-admin";
import WorksList from "./list/WorksList";
import WorksShow from "./show/WorksShow";
import WorksEdit from "./edit/WorksEdit";
import ImagesList from "./list/ImagesList";
import ImagesShow from "./show/ImagesShow";
import ImagesEdit from "./edit/ImagesEdit";

const entrypoint = "http://127.0.0.1:8000/api"
const dataProvider = hydraDataProvider({
    entrypoint,
    httpClient: fetchHydra,
    mercure: true,
    useEmbedded: false,
})

export default () => (
    <HydraAdmin dataProvider={dataProvider} entrypoint={entrypoint} >
        <Resource name="works" list={WorksList} show={WorksShow} edit={WorksEdit}/>
        <Resource name="images" list={ImagesList} show={ImagesShow} edit={ImagesEdit}/>
    </HydraAdmin>
)

