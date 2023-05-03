import {fetchHydra, HydraAdmin, hydraDataProvider} from "@api-platform/admin";
import {Admin, Resource} from "react-admin";
import WorksList from "./list/WorksList";
import WorksShow from "./show/WorksShow";
import WorksCreate from "./create/WorksCreate";
import WorksEdit from "./edit/WorksEdit";
import ImagesList from "./list/ImagesList";
import ImagesShow from "./show/ImagesShow";
import ImagesCreate from "./create/ImagesCreate";
import ImagesEdit from "./edit/ImagesEdit";
import Dashboard from "./dashboard/Dashboard";

const entrypoint = "http://127.0.0.1:8000/api"
const dataProvider = hydraDataProvider({
    entrypoint,
    httpClient: fetchHydra,
    mercure: true,
    useEmbedded: false,
})


const App = () => (
    <HydraAdmin dataProvider={dataProvider} entrypoint={entrypoint}>
        <Resource name="works" list={WorksList} show={WorksShow} edit={WorksEdit} create={WorksCreate}/>
        <Resource name="images" list={ImagesList} show={ImagesShow} edit={ImagesEdit} create={ImagesCreate}/>
    </HydraAdmin>
)

export default App;

