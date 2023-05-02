import {Datagrid, DeleteButton, EditButton, ImageField, List, ReferenceField, ShowButton, TextField} from "react-admin";

const ImagesList = (props) => {
    return (
        <List {...props}>
            <Datagrid>
                <TextField source="id"/>
                <TextField source="name"/>
                <ReferenceField source='works' reference='works'>
                    <TextField source="id"/>
                </ReferenceField>
                <ShowButton source='/images' label={false}/>
                <EditButton basePath='/images' label={false}/>
                <DeleteButton basePAth='/images' label={false}/>
            </Datagrid>
        </List>
    )
}

export default ImagesList;