import {Datagrid, List, TextField, EditButton, DeleteButton, ShowButton} from "react-admin";

const WorkList = (props) => {
    return (
        <List {...props}>
            <Datagrid>
                <TextField source="id"/>
                <TextField source="header"/>
                <ShowButton source='/works' label={false}/>
                <EditButton basePath='/works' label={false}/>
                <DeleteButton basePAth='/works' label={false}/>
            </Datagrid>
        </List>
    )
}

export default WorkList;