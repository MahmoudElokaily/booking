@extends('index')

@section("title" , $title ?? "")

@section("content")
    <div class="modal fade " id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:2rem">
                <div class="modal-header">

                    <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="p_reply" class="post-text-a ml-2"></div>

                <span id="p_reid" style="display:none">0</span>
                <div class="d-flex">
                    <div class="m-2"> <img id="pro_user_header"
                                           src="./img/1637720930-1303e34387013ec393d2.png"
                                           style="width:4rem;height:4rem" alt="" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="flex-fill">
                        <div class="modal-body body-svg">

                            <div id="p-vtype" class="b-hang" dataid="vtype">
                                <div class="d-flex">
                                    <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M24 2.282v9.65s-1.287 1.189-3.144 1.189c-2.873 0-3.326-2.41-6.549-2.41-1.078 0-2.453.601-3.308 1.289v8h-1.999v-20h2v1.84c.866-.447 2.049-.84 3.296-.84 3.413 0 3.479 2.533 6.419 2.533 1.867 0 3.285-1.251 3.285-1.251zm-2 3.119c-2.341.479-3.935-.295-5.46-1.489-1.989-1.558-4.186-.841-5.54.326v5.386c1.01-.518 2.19-.913 3.308-.913 2.28 0 3.63.931 4.616 1.61 1 .69 1.797 1.12 3.076.531v-5.451zm-2 11.599h-7v2h5.84l1.714 3h-17.108l1.714-3h1.84v-2h-3l-4 7h24l-4-7z">
                                            </path>
                                        </svg></div>
                                    <div class="ml-3 post-text-a" id="vtype-value"></div>
                                    <div class="flex-fill text-right mr-3 del-hang"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M5.662 23l-5.369-5.365c-.195-.195-.293-.45-.293-.707 0-.256.098-.512.293-.707l14.929-14.928c.195-.194.451-.293.707-.293.255 0 .512.099.707.293l7.071 7.073c.196.195.293.451.293.708 0 .256-.097.511-.293.707l-11.216 11.219h5.514v2h-12.343zm3.657-2l-5.486-5.486-1.419 1.414 4.076 4.072h2.829zm6.605-17.581l-10.677 10.68 5.658 5.659 10.676-10.682-5.657-5.657z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="p-category" class="b-hang" dataid="category">
                                <div class="d-flex">
                                    <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M7 1h17v2h-17v-2zm0 7h17v-2h-17v2zm0 5h17v-2h-17v2zm0 5h17v-2h-17v2zm0 5h17v-2h-17v2zm-5-22c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 9c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 9c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z">
                                            </path>
                                        </svg></div>
                                    <div class="ml-3 post-text-a" id="category-value"></div>
                                    <div class="flex-fill text-right mr-3 del-hang"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M5.662 23l-5.369-5.365c-.195-.195-.293-.45-.293-.707 0-.256.098-.512.293-.707l14.929-14.928c.195-.194.451-.293.707-.293.255 0 .512.099.707.293l7.071 7.073c.196.195.293.451.293.708 0 .256-.097.511-.293.707l-11.216 11.219h5.514v2h-12.343zm3.657-2l-5.486-5.486-1.419 1.414 4.076 4.072h2.829zm6.605-17.581l-10.677 10.68 5.658 5.659 10.676-10.682-5.657-5.657z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="p-prices" class="b-hang" dataid="prices">
                                <div class="d-flex">
                                    <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M19 16.166c0-4.289-4.465-5.483-7.887-7.091-2.079-1.079-1.816-3.658 1.162-3.832 1.652-.1 3.351.39 4.886.929l.724-3.295c-1.814-.551-3.437-.803-4.885-.841v-2.036h-2v2.134c-3.89.535-5.968 2.975-5.968 5.7 0 4.876 5.693 5.62 7.556 6.487 2.54 1.136 2.07 3.5-.229 4.021-1.993.451-4.538-.337-6.45-1.079l-.909 3.288c1.787.923 3.931 1.417 6 1.453v1.996h2v-2.105c3.313-.464 6.005-2.293 6-5.729z">
                                            </path>
                                        </svg></div>
                                    <div class="ml-3 post-text-a" id="prices-value"></div>
                                    <div class="flex-fill text-right mr-3 del-hang"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M5.662 23l-5.369-5.365c-.195-.195-.293-.45-.293-.707 0-.256.098-.512.293-.707l14.929-14.928c.195-.194.451-.293.707-.293.255 0 .512.099.707.293l7.071 7.073c.196.195.293.451.293.708 0 .256-.097.511-.293.707l-11.216 11.219h5.514v2h-12.343zm3.657-2l-5.486-5.486-1.419 1.414 4.076 4.072h2.829zm6.605-17.581l-10.677 10.68 5.658 5.659 10.676-10.682-5.657-5.657z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="p-urllink" class="b-hang" dataid="urllink">
                                <div class="d-flex">
                                    <div> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M13.723 18.654l-3.61 3.609c-2.316 2.315-6.063 2.315-8.378 0-1.12-1.118-1.735-2.606-1.735-4.188 0-1.582.615-3.07 1.734-4.189l4.866-4.865c2.355-2.355 6.114-2.262 8.377 0 .453.453.81.973 1.089 1.527l-1.593 1.592c-.18-.613-.5-1.189-.964-1.652-1.448-1.448-3.93-1.51-5.439-.001l-.001.002-4.867 4.865c-1.5 1.499-1.5 3.941 0 5.44 1.517 1.517 3.958 1.488 5.442 0l2.425-2.424c.993.284 1.791.335 2.654.284zm.161-16.918l-3.574 3.576c.847-.05 1.655 0 2.653.283l2.393-2.389c1.498-1.502 3.94-1.5 5.44-.001 1.517 1.518 1.486 3.959 0 5.442l-4.831 4.831-.003.002c-1.438 1.437-3.886 1.552-5.439-.002-.473-.474-.785-1.042-.956-1.643l-.084.068-1.517 1.515c.28.556.635 1.075 1.088 1.528 2.245 2.245 6.004 2.374 8.378 0l4.832-4.831c2.314-2.316 2.316-6.062-.001-8.377-2.317-2.321-6.067-2.313-8.379-.002z">
                                            </path>
                                        </svg></div>
                                    <div class="ml-3 post-text-a" id="urllink-value"></div>
                                    <div class="flex-fill text-right mr-3 del-hang"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M5.662 23l-5.369-5.365c-.195-.195-.293-.45-.293-.707 0-.256.098-.512.293-.707l14.929-14.928c.195-.194.451-.293.707-.293.255 0 .512.099.707.293l7.071 7.073c.196.195.293.451.293.708 0 .256-.097.511-.293.707l-11.216 11.219h5.514v2h-12.343zm3.657-2l-5.486-5.486-1.419 1.414 4.076 4.072h2.829zm6.605-17.581l-10.677 10.68 5.658 5.659 10.676-10.682-5.657-5.657z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="p-vtags" class="b-hang" dataid="vtags">
                                <div class="d-flex">
                                    <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M15.354 6h-3.554c-2.721-4.496-9.566-4.523-11.293-1.706-1.341 2.186.061 5.062 3.24 5.062 1.307 0 2.52-.593 4.253-.329v3.567l9.033 9.042 6.967-6.966-8.646-8.67zm-11.606 1.871c-1.996 0-2.738-1.6-1.956-2.835 1.076-1.701 5.756-1.94 8.19.964h-1.982v1.529c-1.922-.233-3.2.342-4.252.342zm9.207 2.645c-.817.817-2.206.394-2.446-.72 1.188.093 1.902-.723 1.795-1.708 1.071.285 1.445 1.634.651 2.428z">
                                            </path>
                                        </svg></div>
                                    <div class="ml-3 post-text-a" id="vtags-value"></div>
                                    <div class="flex-fill text-right mr-3 del-hang"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <path
                                                d="M5.662 23l-5.369-5.365c-.195-.195-.293-.45-.293-.707 0-.256.098-.512.293-.707l14.929-14.928c.195-.194.451-.293.707-.293.255 0 .512.099.707.293l7.071 7.073c.196.195.293.451.293.708 0 .256-.097.511-.293.707l-11.216 11.219h5.514v2h-12.343zm3.657-2l-5.486-5.486-1.419 1.414 4.076 4.072h2.829zm6.605-17.581l-10.677 10.68 5.658 5.659 10.676-10.682-5.657-5.657z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                            <div aria-activedescendant="typeaheadFocus-0.9675831414983171"
                                 aria-autocomplete="list" id="post-text-b"
                                 aria-controls="typeaheadDropdownWrapped-47"
                                 aria-describedby="placeholder-f43e6" aria-label="Tweet text"
                                 aria-multiline="true" class="notranslate public-DraftEditor-content"
                                 contenteditable="true" data-testid="tweetTextarea_0" role="textbox"
                                 spellcheck="true" tabindex="0" no-focuscontainer-refocus="true"
                                 style="width:400px;outline: none;user-select: text;white-space: pre-wrap;overflow-wrap: break-word;">
                                Post trade information!</div>
                            <div id="p-imgs">
                                <div id="post-imgs"></div>
                                <div id="img-action-html" style="display:none">
                                    <div aria-label="Remove media" role="button" tabindex="0"
                                         class="remove-img">
                                        <div dir="auto" class="remove-img-s">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                 viewBox="0 0 24 24" class="remove-img-svg">
                                                <path
                                                    d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-12v-2h12v2z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                    <div aria-label="Edit media" role="button" tabindex="0"
                                         class="edit-img">
                                        <div dir="auto" class="edit-img-s">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-3.994 12.964l3.106 3.105-4.112.931 1.006-4.036zm9.994-3.764l-5.84 5.921-3.202-3.202 5.841-5.919 3.201 3.2z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <input type="file" id="imgupload_post" style="display:none"
                                       accept="image/png, image/jpeg" multiple="multiple">

                            </div>
                            <div id="p-replay" class="d-flext replay-g" data-toggle="dropdown"
                                 aria-expanded="false" style="cursor: pointer">
                                                <span id="replay-value-svg">
                                                    <svg viewBox="0 0 24 24" aria-hidden="true"
                                                         class="r-1cvl2hr r-4qtqp9 r-yyyyoo r-1pexk7n r-1d4mawv r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1mcorv5">
                                                        <g>
                                                            <path
                                                                d="M12 1.5C6.2 1.5 1.5 6.2 1.5 12S6.2 22.5 12 22.5 22.5 17.8 22.5 12 17.8 1.5 12 1.5zM9.047 5.9c-.878.484-1.22.574-1.486.858-.263.284-.663 1.597-.84 1.712-.177.115-1.462.154-1.462.154s2.148 1.674 2.853 1.832c.706.158 2.43-.21 2.77-.142.342.07 2.116 1.67 2.324 2.074.208.404.166 1.748-.038 1.944-.204.196-1.183 1.09-1.393 1.39-.21.3-1.894 4.078-2.094 4.08-.2 0-.62-.564-.73-.848-.11-.284-.427-4.012-.59-4.263-.163-.25-1.126-.82-1.276-1.026-.15-.207-.552-1.387-.527-1.617.024-.23.492-1.007.374-1.214-.117-.207-2.207-1.033-2.61-1.18-.403-.145-.983-.332-.983-.332 1.13-3.652 4.515-6.318 8.52-6.38 0 0 .125-.018.186.14.11.286.256 1.078.092 1.345-.143.23-2.21.99-3.088 1.474zm11.144 8.24c-.21-.383-1.222-2.35-1.593-2.684-.23-.208-2.2-.912-2.55-1.09-.352-.177-1.258-.997-1.267-1.213-.01-.216 1.115-1.204 1.15-1.524.056-.49-1.882-1.835-1.897-2.054-.015-.22.147-.66.31-.81.403-.36 3.19.04 3.556.36 2 1.757 3.168 4.126 3.168 6.873 0 .776-.18 1.912-.282 2.18-.08.21-.443.232-.595-.04z">
                                                            </path>
                                                        </g>
                                                    </svg></span><span id="replay-value">Everyone</span> <span>can
                                                    replay</span>
                                <div class="dropdown-menu p-3" id="m-replay-option" style="width:300px">

                                    <div>Choose who can reply to this Tweet. Anyone mentioned can always
                                        reply.</div>
                                    <div class="d-flex replay-option">
                                                        <span class="replay-option-svg">
                                                            <svg viewBox="0 0 24 24" aria-hidden="true"
                                                                 class="r-jwli3a r-4qtqp9 r-yyyyoo r-1hjwoze r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-12ym1je">
                                                                <g>
                                                                    <path
                                                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm8.472 9.442c-.242.19-.472.368-.63.486-.68-1.265-1.002-1.78-1.256-2.007-.163-.145-.37-.223-.78-.375-.367-.136-1.482-.55-1.65-.85-.087-.153.136-.602.23-.793.088-.177.164-.33.196-.497.123-.646-.33-1.146-.728-1.59-.066-.072-.153-.17-.23-.26.335-.12.862-.26 1.42-.384 1.95 1.448 3.26 3.704 3.428 6.272zm-9.788-7.83c.076.25.145.5.182.678-.255.15-.663.363-.96.52-.262.136-.522.273-.738.392-.247.137-.442.234-.6.313-.347.174-.598.3-.833.553-.068.073-.26.278-1.02 1.886l-1.79-.656c1.293-1.94 3.362-3.31 5.76-3.685zM12 20.5c-4.687 0-8.5-3.813-8.5-8.5 0-1.197.25-2.335.7-3.37.47.182 1.713.66 2.75 1.035-.107.336-.245.854-.26 1.333-.03.855.502 1.7.562 1.792.053.08.12.15.2.207.303.21.687.5.827.616.063.343.166 1.26.23 1.833.144 1.266.175 1.48.24 1.65.005.012.514 1.188 1.315 1.188.576-.003.673-.206 1.855-2.688.244-.512.45-.95.513-1.058.1-.144.597-.61.87-.83.55-.442.76-1.82.413-2.682-.335-.83-1.92-2.08-2.5-2.195-.17-.033-.43-.04-.953-.053-.497-.01-1.25-.028-1.536-.09-.098-.024-.314-.094-.605-.196.32-.668.627-1.28.71-1.4.05-.052.168-.112.408-.234.17-.086.383-.192.653-.34.208-.116.458-.247.71-.38 1.168-.612 1.484-.8 1.658-1.082.11-.177.263-.44-.04-1.544 1.042.027 2.038.24 2.955.61-.89.32-1.024.595-1.106.77-.367.784.256 1.475.667 1.93.096.107.24.268.32.38l-.017.036c-.234.472-.67 1.35-.196 2.194.406.72 1.384 1.13 2.437 1.52.134.05.25.092.33.126.16.208.496.79 1 1.735l.154.285c.078.14.33.505.842.505.167 0 .363-.04.59-.137.032-.013.083-.035.18-.094C19.72 17.405 16.22 20.5 12 20.5zm-3.812-9.45c.01-.285.102-.646.184-.907l.027.006c.397.09 1.037.11 1.83.13.32.006.59.008.615 0 .326.143 1.355 1 1.483 1.31.113.28.05.812-.034 1.01-.233.197-.845.735-1.085 1.078-.093.13-.212.373-.64 1.274-.133.276-.313.654-.488 1.013-.026-.225-.054-.472-.08-.686-.225-2.003-.273-2.22-.42-2.445-.05-.078-.202-.31-1.135-.973-.117-.213-.268-.564-.26-.813z">
                                                                    </path>
                                                                </g>
                                                            </svg></span>
                                        <span class="replay-option-val">Everyone</span>
                                    </div>
                                    <div class="d-flex replay-option">
                                                        <span class="replay-option-svg">
                                                            <svg viewBox="0 0 24 24" aria-hidden="true"
                                                                 class="r-jwli3a r-4qtqp9 r-yyyyoo r-1hjwoze r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-12ym1je">
                                                                <g>
                                                                    <path
                                                                        d="M10.43 12.24c-1.37 0-2.89-.15-3.87-1.26-.82-.95-1.09-2.39-.81-4.43C6.13 3.7 7.88 2 10.43 2s4.3 1.7 4.68 4.55c.27 2.04.01 3.49-.81 4.42-.98 1.12-2.51 1.27-3.87 1.27zm0-8.73c-2.39 0-3.03 2.03-3.19 3.24-.21 1.56-.06 2.65.45 3.23.46.53 1.28.75 2.73.75 1.46 0 2.28-.22 2.74-.75.51-.58.66-1.67.45-3.23-.16-1.21-.79-3.24-3.18-3.24zm2.01 18.99H4.22c-.7 0-1.33-.3-1.75-.83-.43-.54-.57-1.26-.4-1.95.88-3.55 4.31-6.03 8.34-6.03.42 0 .75.34.75.75 0 .42-.34.75-.75.75-3.34 0-6.17 2.01-6.88 4.89-.06.25-.02.49.12.66.13.16.32.25.56.25h8.22c.42 0 .75.34.75.75.01.42-.32.76-.74.76zm9.15-10.87l-4.2 8.46c-.01.03-.02.05-.04.07-.02.06-.06.11-.1.15-.05.05-.1.09-.15.13h-.01c-.06.04-.12.06-.19.08-.07.02-.13.03-.2.03-.05 0-.11 0-.17-.02-.06-.01-.11-.03-.16-.06-.06-.03-.12-.07-.18-.12-.01-.01-.03-.02-.04-.03l-3.08-3.27c-.28-.3-.27-.78.04-1.06.3-.29.77-.27 1.06.03l2.34 2.48 3.74-7.53c.18-.37.63-.52 1-.34.37.17.52.63.34 1z">
                                                                    </path>
                                                                    <path
                                                                        d="M17.1 20.44c.05-.04.1-.08.15-.13 0 .01-.02.03-.03.04-.04.04-.08.06-.12.09z">
                                                                    </path>
                                                                </g>
                                                            </svg></span>
                                        <span class="replay-option-val">Pepole you fllow</span>
                                    </div>

                                    <div class="d-flex replay-option">
                                                        <span class="replay-option-svg">
                                                            <svg viewBox="0 0 24 24" aria-hidden="true"
                                                                 class="r-jwli3a r-4qtqp9 r-yyyyoo r-1hjwoze r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-12ym1je">
                                                                <g>
                                                                    <path
                                                                        d="M16.04 7.266c-.45 0-.815.297-.947.7l-.03.113s-1.064-1.397-3.277-1.397c-2.855 0-4.928 2.4-4.928 5.706 0 2.495 1.755 4.525 3.912 4.525 2.307 0 3.632-1.492 3.632-1.492s.597 1.75 3.503 1.75c.49 0 4.837-.297 4.837-5.172 0-5.923-4.82-10.743-10.744-10.743-5.922 0-10.74 4.82-10.74 10.743 0 5.924 4.818 10.743 10.742 10.743 2.244 0 4.04-.544 5.82-1.765.163-.112.273-.283.31-.48s-.005-.394-.118-.557c-.224-.327-.71-.418-1.037-.193-1.516 1.04-3.05 1.504-4.976 1.504-5.102 0-9.25-4.15-9.25-9.25S6.9 2.75 12 2.75 21.25 6.9 21.25 12c0 2.916-1.822 3.9-3.234 3.9-.53 0-2.234-.213-1.906-2.103 0 0 .938-5.4.938-5.523-.002-.557-.452-1.008-1.01-1.008zm-2.235 6.55c-.58.83-1.378 1.305-2.247 1.335l-.105.003c-1.483 0-2.52-1.112-2.578-2.768-.075-2.12 1.366-3.964 3.146-4.027l.102-.002c1.423 0 2.417 1.07 2.474 2.66.035 1.024-.245 2.018-.79 2.8z">
                                                                    </path>
                                                                </g>
                                                            </svg></span>
                                        <span class="replay-option-val">Only pepole you mention</span>
                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="row v-body">

        <div class="col-lg-8 col-md-12 border-right p-0">

            <style type="text/css">
                .info-img-box {
                    width: 100%;
                    margin: 0 auto;
                    height: 300px;
                    max-height: 300px;
                    display: flex;
                    flex-direction: row;
                }

                .info-img-box-c {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                    width: 100%;
                }

                .info-img-content {
                    margin: 1px;
                    flex-grow: 5;
                    height: 100%;
                    width: 99%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center center;
                    position: relative;
                }

                .list-group-item {
                    padding: 0 !important
                }

                .menu-icon:hover {
                    background-color: #d5ddf3 !important;
                }
            </style>
            <div class="info-list">
                <ul class="list-group posts">

                    @foreach($posts as $post)
                        <li class="list-group-item">
                        <article href="/qiongliwu/posts/27294">
                            <div class="d-inline-flex" style="width:100%"> <a href="#/qiongliwu">
                                    <div class="info_author_photo pl-2 pt-2"><img
                                            src="@if(isset($post['user']['photo'])) {{asset('images/' . $post['user']['name'] . "/" . $post['user']['photo'])}} @else {{asset('images/default/default.jpg')}} @endif"
                                            alt="..." style="width:3rem;height:3rem"
                                            class="mr-3 rounded-circle"></div>
                                </a>
                                <div class="flex-fill pt-2">
                                    <div class="d-flex">
                                        <div class="d-flex info_author">
                                            <div>

                                                <div class="d-flex">
                                                    <a href="#/qiongliwu" class="text-a">
                                                        <div style="line-height:100%"> <span
                                                                class="v-text-s">
                                                                                {{$post['user']['name'] ?? ""}}</span>
                                                        </div>
                                                    </a>
                                                    <div class="pl-2 text-m">
                                                        <span class="text-to">{{$post['user']['email'] ?? ""}}</span>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="pl-2">.
                                                <a href="#/qiongliwu/posts/27294" class="text-a">
                                                    {{\Carbon\Carbon::parse($post['created_at'])->diffForHumans()}} </a>
                                            </div>
                                        </div>
                                        <div
                                            class=" el-action-s menu-icon pl-2 pr-2 rounded-circle ml-auto">
                                            <div class="dropleft" data-toggle="tooltip"
                                                 data-placement="top" title=""
                                                 data-original-title="more">
                                                                <span data-toggle="dropdown" aria-expanded="false">
                                                                    <svg viewBox="0 0 24 24" aria-hidden="true"
                                                                         class="blue" style="height:1.25rem;width:1.25rem; line-height: 1.65em;
                        cursor: pointer;">
                                                                        <g>
                                                                            <circle cx="5" cy="12" r="2"></circle>
                                                                            <circle cx="12" cy="12" r="2"></circle>
                                                                            <circle cx="19" cy="12" r="2"></circle>
                                                                        </g>
                                                                    </svg></span>

                                                <div class="dropdown-menu p-3">
                                                    <div
                                                        class="d-flex div-info-more-item dropdown-item">
                                                        <div><i
                                                                class="fas fa-envelope fa-fw"></i>
                                                        </div>
                                                        <div class="ml-2">
                                                            <a href="{{route('chat' , $post['user']['id'] ?? "")}}">
                                                                <span>Message - {{$post->user->name ?? ""}}</span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="info-intro text-truncate" style="max-width: 500px">
                                        <span class="text-success "></span>
                                        {{$post['description']}}
                                    </div>
                                    @if( isset($post['fileNames']) && $post['fileNames'] != "")
                                        <div class="info-photo mr-3 border rounded p-1">
                                            <div class="info-img-box ">
                                                @foreach(json_decode($post['fileNames']) as $index => $file)
                                                    @if (($index % 2) == 0)
                                                        <div class="info-img-box-c">
                                                    @endif
                                                        <div class="info-img-content post-image" datai="0"
                                                             style="background-image: url('{{asset('images/owner/' . $post['user']['name'] . '/' . $file)}}');">
                                                            <img draggable="false" class="css-img-p"
                                                                 src="">
                                                        </div>

                                                    @if(($index % 2) == 0)
                                                        </div>
                                                    @endif
                                                @endforeach
                                         </div>

                                    </div>
                                    @endif
                                    <div
                                        class="d-flex justify-content-between p-3 div-share-likes-reply">
                                        <div class="el-action-s el-reply p-1 pl-2 pr-2"
                                             data-toggle="tooltip" title="" datau=" 27294"
                                             data-original-title="Reply"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="el-action-s"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.145 7.961-9.91 7.961-1.937 0-3.383-.397-4.394-.644-1 .613-1.595 1.037-4.272 1.82.535-1.373.723-2.748.602-4.265-.838-1-2.025-2.4-2.025-4.872-.001-4.415 4.485-8.007 9.999-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.738 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.418.345 2.775.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm-3.5 10c0 .829-.671 1.5-1.5 1.5-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5c.829 0 1.5-.671 1.5-1.5s-.671-1.5-1.5-1.5zm5 0c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5c.829 0 1.5-.671 1.5-1.5s-.671-1.5-1.5-1.5z">
                                                </path>
                                            </svg><span class="pl-1">1.1k</span>
                                        </div>
                                        <div class="el-action-s  p-1 pl-2 pr-2 " data-toggle="tooltip"
                                             title="" data-original-title="Relay"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                data-toggle="dropdown">
                                                <path
                                                    d="M21 9h2v11h-17v3l-6-4 6-4v3h15v-9zm-18-3h15v3l6-4-6-4v3h-17v11h2v-9z">
                                                </path>
                                            </svg><span class="pl-1"></span>
                                            <div class="dropdown-menu p-3">
                                                <div class="d-flex div-info-more-item dropdown-item el-relay"
                                                     datau="27294">
                                                    <div><svg xmlns="http://www.w3.org/2000/svg"
                                                              width="20" height="20" viewBox="0 0 24 24"
                                                              fill="#858796">
                                                            <path
                                                                d="M21 9h2v11h-17v3l-6-4 6-4v3h15v-9zm-18-3h15v3l6-4-6-4v3h-17v11h2v-9z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Relay</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="el-action-s  p-1 pl-2 pr-2 " data-toggle="tooltip"
                                             title="" data-original-title="Chat"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512">
                                                <path
                                                    d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1 .9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9 .7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z" />
                                            </svg>
                                            <a href="{{route('chat' , $post['user']['id'] ?? "")}}">
                                                <span class="pl-1">Connect</span>
                                            </a>
                                            <div class="dropdown-menu p-3">
                                                <div class="d-flex div-info-more-item dropdown-item el-Chat"
                                                     datau="27294">
                                                    <div><svg xmlns="http://www.w3.org/2000/svg"
                                                              viewBox="0 0 576 512">
                                                            <path
                                                                d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1 .9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9 .7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Chat</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="el-action-s  p-1 pl-2 pr-2" data-toggle="tooltip"
                                             title="" data-original-title="Share"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                data-toggle="dropdown">
                                                <path
                                                    d="M6 2c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1zm15 9c.552 0 1 .448 1 1s-.448 1-1 1-1-.449-1-1c0-.552.448-1 1-1zm-15 9c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1zm0-20c-1.656 0-3 1.343-3 3s1.344 3 3 3 3-1.343 3-3-1.344-3-3-3zm15 9c-1.656 0-3 1.343-3 3s1.344 3 3 3 3-1.343 3-3-1.344-3-3-3zm-15 9c-1.657 0-3 1.343-3 3s1.343 3 3 3c1.656 0 3-1.343 3-3s-1.344-3-3-3zm4.588-16.979l.412-.021c4.281 0 7.981 2.45 9.8 6.021-.717.029-1.39.21-1.998.511-1.555-2.703-4.466-4.532-7.802-4.532 0-.703-.149-1.372-.412-1.979zm10.212 15.958c-1.819 3.571-5.519 6.021-9.8 6.021l-.412-.021c.263-.607.412-1.276.412-1.979 3.336 0 6.247-1.829 7.802-4.532.608.302 1.281.483 1.998.511zm-18.91 1.186c-1.193-1.759-1.89-3.88-1.89-6.165s.697-4.406 1.89-6.165c.392.566.901 1.039 1.487 1.403-.867 1.383-1.377 3.012-1.377 4.762s.51 3.379 1.377 4.762c-.586.364-1.096.837-1.487 1.403z">
                                                </path>
                                            </svg><span class="pl-1">1.1k</span>
                                            <div class="dropdown-menu p-3 shadow dropdown-menu-right ">
                                                <div class="d-flex div-info-more-item dropdown-item el-sendmsg"
                                                     datau="27294">
                                                    <div><svg viewBox="0 0 24 24" aria-hidden="true">
                                                            <g>
                                                                <path
                                                                    d="M19.25 3.018H4.75C3.233 3.018 2 4.252 2 5.77v12.495c0 1.518 1.233 2.753 2.75 2.753h14.5c1.517 0 2.75-1.235 2.75-2.753V5.77c0-1.518-1.233-2.752-2.75-2.752zm-14.5 1.5h14.5c.69 0 1.25.56 1.25 1.25v.714l-8.05 5.367c-.273.18-.626.182-.9-.002L3.5 6.482v-.714c0-.69.56-1.25 1.25-1.25zm14.5 14.998H4.75c-.69 0-1.25-.56-1.25-1.25V8.24l7.24 4.83c.383.256.822.384 1.26.384.44 0 .877-.128 1.26-.383l7.24-4.83v10.022c0 .69-.56 1.25-1.25 1.25z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Send via Direct
                                                                            Message</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex div-info-more-item dropdown-item el-bookmarks"
                                                     datau="27294">
                                                    <div><svg viewBox="0 0 24 24" aria-hidden="true">
                                                            <g>
                                                                <path
                                                                    d="M23.074 3.35H20.65V.927c0-.414-.337-.75-.75-.75s-.75.336-.75.75V3.35h-2.426c-.414 0-.75.337-.75.75s.336.75.75.75h2.425v2.426c0 .414.335.75.75.75s.75-.336.75-.75V4.85h2.424c.414 0 .75-.335.75-.75s-.336-.75-.75-.75zM19.9 10.744c-.415 0-.75.336-.75.75v9.782l-6.71-4.883c-.13-.095-.285-.143-.44-.143s-.31.048-.44.144l-6.71 4.883V5.6c0-.412.337-.75.75-.75h6.902c.414 0 .75-.335.75-.75s-.336-.75-.75-.75h-6.9c-1.242 0-2.25 1.01-2.25 2.25v17.15c0 .282.157.54.41.668.25.13.553.104.78-.062L12 17.928l7.458 5.43c.13.094.286.143.44.143.117 0 .234-.026.34-.08.252-.13.41-.387.41-.67V11.495c0-.414-.335-.75-.75-.75z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Add posts to
                                                                            Bookmarks</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex div-info-more-item dropdown-item el-sendmsg"
                                                     datau="27294">
                                                    <div><svg viewBox="0 0 24 24" aria-hidden="true">
                                                            <g>
                                                                <path
                                                                    d="M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z">
                                                                </path>
                                                                <path
                                                                    d="M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Copy link </span>
                                                    </div>
                                                </div>
                                                <div class="d-flex div-info-more-item dropdown-item el-sendmsg"
                                                     datau="27294">
                                                    <div>
                                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                                            <g>
                                                                <path
                                                                    d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z">
                                                                </path>
                                                                <path
                                                                    d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2"><span>Share posts via …</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="el-action-s el-likes p-1 pl-2 pr-2" datau="27294">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 data-toggle="tooltip" title=""
                                                 class="rounded-circle p-1" data-original-title="Like">
                                                <path
                                                    d="M15.43 8.814c.808-3.283 1.252-8.814-2.197-8.814-1.861 0-2.35 1.668-2.833 3.329-1.971 6.788-5.314 7.342-8.4 7.743v9.928c3.503 0 5.584.729 8.169 1.842 1.257.541 3.053 1.158 5.336 1.158 2.538 0 4.295-.997 5.009-3.686.5-1.877 1.486-7.25 1.486-8.25 0-1.649-1.168-2.446-2.594-2.507-1.21-.051-2.87-.277-3.976-.743zm3.718 4.321l-1.394.167s-.609 1.109.141 1.115c0 0 .201.01 1.069-.027 1.082-.046 1.051 1.469.004 1.563l-1.761.099c-.734.094-.656 1.203.141 1.172 0 0 .686-.017 1.143-.041 1.068-.056 1.016 1.429.04 1.551-.424.053-1.745.115-1.745.115-.811.072-.706 1.235.109 1.141l.771-.031c.822-.074 1.003.825-.292 1.661-1.567.881-4.685.131-6.416-.614-2.238-.965-4.437-1.934-6.958-2.006v-6c3.263-.749 6.329-2.254 8.321-9.113.898-3.092 1.679-1.931 1.679.574 0 2.071-.49 3.786-.921 5.533 1.061.543 3.371 1.402 6.12 1.556 1.055.059 1.025 1.455-.051 1.585z">
                                                </path>
                                            </svg><span class="pl-1"></span>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </article>


                    </li>
                    @endforeach





                </ul>
            </div>


{{--            <div class="d-flex  justify-content-center m-3 pageslist">--}}
{{--                <div class="mr-5">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="disabled">--}}
{{--                        <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z">--}}
{{--                        </path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div class="ml-5">--}}
{{--                    <a href="?page=2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title=""--}}
{{--                             viewBox="0 0 24 24" data-original-title="Next Page">--}}
{{--                            <path--}}
{{--                                d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z">--}}
{{--                            </path>--}}
{{--                        </svg></a>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <div class="col-lg-4 mb-4 pr-0">
            <style type="text/css">
                .card-body .user-list-item span {
                    font-size: 0.6rem;
                    height: 0.6rem;
                }

                .text-ms {
                    font-size: 0.8em
                }

                .tagdiv:hover {
                    background-color: #dcdfe9
                }
            </style>
            @include('inc.suggestion')
        </div>
    </div>
@endsection


