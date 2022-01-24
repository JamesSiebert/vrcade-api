import { createTheme } from '@mui/material';
import { amber, grey, purple } from '@mui/material/colors';


export const darkTheme = createTheme({
    palette: {
        mode: 'dark',
        primary: amber,
        divider: amber[200],
        text: {
            primary: grey[300],
            secondary: purple[200],
        },
        background: {
            default: grey[900],
            paper: purple[900],
        },
    },
});
