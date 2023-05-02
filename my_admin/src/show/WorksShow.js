import {Datagrid, ReferenceArrayField, Show, SimpleShowLayout, TextField,} from "react-admin";
import React from "react";

const WorksShow = (props) => {
    return (
        <Show {...props}>
            <SimpleShowLayout>
                <TextField source='header'/>
                <TextField source='description'/>
                <ReferenceArrayField source='images' reference='images'>
                    <Datagrid bulkActionButtons={false}>
                        <TextField source="id"/>
                        <TextField source="name"/>
                    </Datagrid>
                </ReferenceArrayField>
            </SimpleShowLayout>
        </Show>
    )
}

export default WorksShow