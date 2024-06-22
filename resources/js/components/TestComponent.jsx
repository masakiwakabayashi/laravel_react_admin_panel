import { createRoot } from 'react-dom/client';

const TestComponent = (props) => {
    return <div>Hello {props.name}</div>
}

export default TestComponent

// 以下のコードでBladeにReactコンポーネントを差し込んでいる
const elems = document.querySelectorAll('[react=test-component]')
if (elems) {
    Array.from(elems)
        .filter(elem => elem.childNodes.length == 0)
        .forEach(elem => {
            const dataset = elem.dataset;
            const root = createRoot(elem);
            root.render(
                <TestComponent {...dataset} />
            )
        })
}
